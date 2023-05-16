<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\CartResource;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
     /**
     * @OA\Post(
     *     path="/carts/check",
     *     tags={"Cart"},
     *     summary="Store cart",
     *     @OA\RequestBody(
     *          required = true,
     *        description = "Data packet for Test",
     *        @OA\JsonContent(
     *             type="object",
        *   @OA\Property(
        *      property="erp_codes",
        *      type="array",
        *      @OA\Items(
* @OA\Property(
     *                         property="erp_code",
     *                         type="string",
     *                         example=""
     *                      ),
     *                      @OA\Property(
     *                         property="quantity",
     *                         type="integer",
     *                         example=""
     *                      ),
        *         ),
        *      description="Store reward index"
        * )
        *)
     *     ),
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response="403", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function check(Request $request)
    {
        $this->validate($request, [
            'erp_codes' => 'required',
            'erp_codes.*' => 'required|array',
            'erp_codes.*.erp_code' => 'required|exists:products,erp_code',
            'erp_codes.*.quantity' => 'required|min:1',
        ]);
           
        $cart = collect( $request->get('erp_codes') );
      
        $products = [];
        
        $carts = $cart->map(function ($item, $key) use(&$products) {
                        
            $error = "";

            $product = Product::whereErpCode($item['erp_code'])->first();

            if( ! $product->isPurchasableProduct() ){
                $error = "محصول موردنظر شما موجودی ندارد غیرقابل سفارش است";
            }

            if( $product->isAuthorityLimitCountOrderOfProduct($item['quantity']) ){
                $error = "تعداد سفارش این محصول بیشتراز حد مجاز می باشد";
            }

            if($error == ""){
                return NULL;
            }

            return $products[$key] = [
                "name"  => $product->name,
                "error" => $error
            ];
        });
        
    
        return $products;
    }
    
    
    function totalPrice(Request $request){
        $userProducts = [];
        foreach($request->all() as $product){
            $userProducts[$product['id']] = $product['count'];
        }
        $products = Product::whereIn('id', array_keys($userProducts))->get();
        $totalPrice = 0;
        foreach($products as $product){
            $totalPrice += ($product->sell_price - $product->discount_price) * $userProducts[$product->id];
        }
        return [
            "totalPrice" => $totalPrice
        ]; 
    }
    
    
}
