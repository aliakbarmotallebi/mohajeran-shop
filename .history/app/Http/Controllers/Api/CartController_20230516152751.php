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
     *     path="/carts/",
     *     tags={"Cart"},
     *     summary="Store cart",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *        )
     *     ),
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response="403", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'erp_codes' => 'required',
            'erp_codes.*' => 'required|array',
            'erp_codes.*.erp_code' => 'required',
            'erp_codes.*.quantity' => 'required|numeric|min:1',
        ]);
           
        $cart = collect( $request->get('erp_codes') );
      
        $products = [];
        
        $carts = $cart->map(function ($item, $key) use(&$products) {
                        
            $error = "این محصول وجود ندارد";

            $product = Product::whereErpCode($item['erp_code'])->first();

            if( $product ){
                if( !$product->isPurchasableProduct() ){
                    $error = "
                       محصول موردنظر شما موجودی ندارد غیرقابل سفارش است
                    ";
                }
            }
            
            $products[$key] = $error;

            return $products;
        });
        
    
        return $products;
    }
    
    
    function totalPrice(Request $request){
            //  return response($request->all(),500);
            $userProducts = [];
            foreach($request->all() as $product){
                $userProducts[$product['id']] = $product['count'];
                
            }
            // return response($userProducts, 500); 
            
            $products = Product::whereIn('id', array_keys($userProducts))->get();

            $totalPrice = 0;
            
            foreach($products as $product){
                
                // dd($product);
                $totalPrice += ($product->sell_price - $product->discount_price) * $userProducts[$product->id];
                
            }
            
            
            return [
                
                "totalPrice" => $totalPrice
                
                ];
            
    }
    
    
}
