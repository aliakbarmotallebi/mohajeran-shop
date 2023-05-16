<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderItemsResource;
use App\Http\Resources\OrderDetailsResource;
use App\Jobs\SendNewUserOrderToHoloo;
use App\Jobs\NotifyTelegramOrderCreated;
use App\Traits\ApiResponser;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    use ApiResponser;
    /**
     * @OA\Get(
     *     path="/orders",
     *     tags={"Order"},
     *     summary="List all Orders self user",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        $orders = $request->user()->orders()->latest();
        return OrderResource::collection($orders->get());
    }


    /**
     * @OA\Post(
     *     path="/orders",
     *     tags={"Order"},
     *     summary="Store cart products to order",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     * @OA\Schema(
     *      type="array",
     *     @OA\Items(
     *     type="object",
     *     @OA\Property(
     *                     property="erp_code",
     *                     description="erp_code",
     *                     type="string",
     *                 ),
     *            @OA\Property(
     *                     property="quantity",
     *                     description="quantity",
     *                     type="number",
     *                 ),
     *                @OA\Property(
     *                     property="attr",
     *                     description="attr",
     *                     type="string",
     *                 ),
     *
     *     )
     * )
     *         )
     *     ),
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response="403", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            '*.erp_code' => 'required|exists:products,erp_code',
            '*.quantity' => 'required|min:0.01',
        ]);

        DB::beginTransaction();

        try {

            $order = $this->createOrder($request->user('api'));

            if(!$order instanceof Order){
                throw new Exception("مشکل در ایجاد سفارش");
            }


            $cart = collect( $request->all() );

            $total = 0;

            $cart->map(function ($item) use($order, &$total) {
                $product = Product::whereErpCode($item['erp_code'])->first();

                if( ! $product->isPurchasableProduct() ){
                    throw new Exception("امکان سفارش این محصول {$product->name} وجود ندارد");
                }

                $orderItem = $order->items()->create([
                    'product_erp_code'   => $item['erp_code'],
                    'price'              => (int)$product->getPrice(),
                    'unit_price'         => $product->getPriceOriginal(),
                    'quantity'           => $item['quantity'],
                    'comment'            => $item['attr'] ?? NULL
                ]);


                $product->decrement('fewtak', (int)$item['quantity']);

                $total += (int)($item['quantity'] * $product->getPrice());

                 if  ( $orderItem instanceof OrderItem) {
                     return true;
                 }

                throw new Exception("error");
            });

            $order->total_price = $total;
            $order->status = "Pending";

            $this->minOrderAmount($order);

            if($order->save()){

                DB::commit();

                $this->dispatch((new SendNewUserOrderToHoloo($order)));
                //$this->dispatch( new NotifyTelegramOrderCreated($order) );


                return $this->success(
                    new OrderResource($order)
                    ,'سفارش شما با موفقیت ثبت شد');
            }

            throw new Exception("خطا در ایجاد سفارش مجددا تلاش کنید");

        } catch (\Exception $e) {
            DB::rollback();
            return $this->error($e->getMessage(), 400);
        }


    }


    /**
     * @OA\Post(
     *     path="/orders/save",
     *     tags={"Order"},
     *     summary="Store cart products to order",
     * description="[suggest: {1, 0}, shipping_method: {TAXI, NORMAL}, payment_method: {HOME_DELIVERY, WALLET}]",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
    * @OA\Schema(
     *     type="object",
     * 	  @OA\Property(
     *                     property="address",
     *                     description="suggest",
     *                     type="string",

     *                 ),
	 *      @OA\Property(
     *                     property="suggest",
     *                     description="suggest",
     *                     type="string",
     *                 ),
	 * @OA\Property(
     *                     property="shipping_method",
     *                     type="string",
     *                     description="TAXI|NORMAL",
     *                 ),
	 * @OA\Property(
     *                     property="payment_method",
     *                      description="WALLET|HOME_DELIVERY",

     *                     type="string",
     *                 ),
     * @OA\Property(
*              property="products",
*              type="array",
     *     @OA\Items(
     *     @OA\Property(
     *                     property="erp_code",
     *                     description="erp_code",
     *                     type="string",
     *                 ),
     *            @OA\Property(
     *                     property="quantity",
     *                     description="quantity",
     *                     type="number",
     *                 ),
     *                @OA\Property(
     *                     property="attr",
     *                     description="attr",
     *                     type="string",
     *                 ),
     *
     *     )
     * )
     *         )
     *  ) 
     *     ),
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response="403", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function save(Request $request)
    {

        $this->validate($request, [
            'products' => 'required',
            'products.*' => 'required|array',
            'products.*.erp_code' => 'required|exists:products,erp_code',
            'products.*.quantity' => 'required|min:0.01',
            'products.*.attr' => 'nullable',
            'suggest' => 'boolean|nullable',
            'address' => 'required',
            'shipping_method' => 'required|in:TAXI,NORMAL',
            'payment_method' => 'required|in:WALLET,HOME_DELIVERY',
        ]);

        DB::beginTransaction();

        try {

            $order = $this->createOrder($request->user('api'));

            if(!$order instanceof Order){
                throw new Exception("مشکل در ایجاد سفارش");
            }


            $cart = collect( $request->get('products') );

            $total = 0;

            $cart->map(function ($item) use($order, &$total) {
                $product = Product::whereErpCode($item['erp_code'])->first();

                if( ! $product->isPurchasableProduct() ){
                    throw new Exception("امکان سفارش این محصول {$product->name} وجود ندارد");
                }

                $orderItem = $order->items()->create([
                    'product_erp_code'   => $item['erp_code'],
                    'price'              => (int)$product->getPrice(),
                    'unit_price'         => $product->getPriceOriginal(),
                    'quantity'           => $item['quantity'],
                    'comment'            => $item['attr'] ?? NULL
                ]);


                $product->decrement('fewtak', (int)$item['quantity']);

                $total += (int)($item['quantity'] * $product->getPrice());

                 if  ( $orderItem instanceof OrderItem) {
                     return true;
                 }

                throw new Exception("error");
            });

            $order->total_price = $total;
            $order->is_suggest = $request->get('suggest') ?? 0;
            $order->customeraddress = $request->get('address') ?? NULL;
            $order->shipping_method = $request->get('shipping_method') ?? NULL;
            $order->payment_method = $request->get('payment_method') ?? NULL;

            if($order->payment_method == 'HOME_DELIVERY') {
                $order->status_paid = 'STATUS_PAID';
            }

            $order->status = "Pending";

            $this->minOrderAmount($order);

            if($order->save()){

                DB::commit();

                $this->dispatch((new SendNewUserOrderToHoloo($order)));
                //$this->dispatch( new NotifyTelegramOrderCreated($order) );


                return $this->success(
                    new OrderResource($order)
                    ,'سفارش شما با موفقیت ثبت شد');
            }

            throw new Exception("خطا در ایجاد سفارش مجددا تلاش کنید");

        } catch (\Exception $e) {
            DB::rollback();
            return $this->error($e->getMessage(), 400);
        }


    }
    
    /**
     * @OA\Get(
     *     path="/orders/{order}",
     *     tags={"Order"},
     *     summary="Display Order by orderId self user",
     *     @OA\Parameter(
     *          name="order",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function show(Order $order)
    {
        $orderUser = $order->customer_erp_code ?? NULL;
        $userId = auth('api')->user()->erp_code ?? NULL;
        if($orderUser === $userId){
            return OrderItemsResource::collection($order->items);
        }
        return $this->error('This action is unauthorized', 401);
    }
    
    /**
     * @OA\Get(
     *     path="/orders/details/{order}",
     *     tags={"Order"},
     *     summary="Display Order by details self user",
     *     @OA\Parameter(
     *          name="order",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function details(Order $order)
    {
        $orderUser = $order->customer_erp_code ?? NULL;
        $userId = auth('api')->user()->erp_code ?? NULL;
        if($orderUser === $userId){
            return new OrderDetailsResource($order);
        }
        return $this->error('This action is unauthorized', 401);
    }

    /**
     * @OA\Get(
     *     path="/orders/{order}/cancelled",
     *     tags={"Order"},
     *     summary="order cancelled",
     *     @OA\Parameter(
     *          name="order",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function cancelled(Order $order)
    {
        $orderUser = $order->customer_erp_code ?? NULL;
        $userId = auth('api')->user()->erp_code ?? NULL;

        $order->is_cancelled = 1;
        if($order->save()){
           return $this->success('', 'کاربرگرامی سفارش شما کنسل شد.');
        }

        return $this->error('This action is unauthorized', 401);
    }


        /**
     * @OA\Get(
     *     path="/orders/courier/cost",
     *     tags={"Order"},
     *     summary="Display Order cost",
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function courierCost()
    {
        return [
            'min_order_amount'   => settings('MIN_ORDER_AMOUNT') ?? 0,
            'price_courier_cost' => settings('PRICE_COURIER_COST') ?? 0
        ];
    }

    protected function createOrder(User $user)
    {
        return Order::create([
            'customer_erp_code' => $user->erp_code
        ]);
    }


  protected function minOrderAmount (Order $order)
    {
        if( $order->shipping_method == 'TAXI'){

            $order->items()->create([
                'product_erp_code'   => settings('ERPCODE_COURIER_COST'),
                'price'              => settings('PRICE_COURIER_COST'),
                'unit_price'         => settings('PRICE_COURIER_COST') ."0",
                'quantity'           => 1,
            ]);
        }
    }
}
