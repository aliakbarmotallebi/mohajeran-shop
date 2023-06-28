<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Models\MainGroup;
use App\Models\Product;
use App\Models\SideGroup;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ProductRequest;
use App\Traits\ApiResponser;
use App\Jobs\NotifyTelegramSearchNullable;

class ProductController extends ApiController
{
    use ApiResponser;

/**
	 * @OA\Get(
	 *     path="/products",
     *     tags={"Product"},
     *     summary="List all Products",
     *     @OA\Parameter(
     *          name="q",
     *          required=false,
     *          in="query",
     *     ),
     *     @OA\Parameter(
     *          name="sort",
     *          required=false,
     *          in="query",
     *         @OA\Schema(
     *         type="array",
     *           @OA\Items(
     *               type="string",
     *               enum={"VISIT_COUNT", "CHEAP", "EXPENSIVE", "DISCOUNT"}, 
     *               default="VISIT_COUNT"
     *           ),
     *         ),
     *     ),
     *     @OA\Parameter(
     *          name="count",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="category",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="subcategory",
     *          required=false,
     *          in="query",
     *          description="required send param subcategory with param category",
     *         @OA\Schema(
     *         type="array",
     *           @OA\Items(
     *               type="string",
     *               default="bAAbNA5zDg0="
     *           ),
     *         ),
     *     ),
	 *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
	 * )
	 */

    // 1 => 'getVisitCount',
    // 2 => 'getBestSeller',
    // 3 => 'getSpecial'
    public function index(ProductRequest $request)
    {
        $product = Product::withCount([
            'order_items'
        ])->filter($request)->where('fewtak', '!=', '0')
                ->orderBy('fewtak', 'DESC')
            ->orderBy('image', 'DESC')
            ->orderBy('available', 'DESC')
            ->whereNotIn('erp_code', [
                'bBALNA1mckd7Zh4O',
                'bBALNA1mckh7QB4O',
                'bBAHNA1mckd5dh4O',
                'bBAHNA1mckd4dh4O',
                'bBAHNA1mckd7QB4O',
                'bBALNA1mckd7Zh4O'
            ]);

        // if($product->count() === 0){
        //     $this->dispatch( new NotifyTelegramSearchNullable($request->get('q')) );
        // }
        return ProductResource::collection($product->paginate($request->get('count') ?? 16)->withQueryString());
    }

   public function search(Request $request)
    {
        $products = Product::query();

        if($request->has("q")){
            $products = $products->search($request->get('q'), 0)->orderBy('few', 'DESC')
            ->orderBy('image', 'DESC')
            ->orderBy('available', 'DESC')
            ->whereNotIn('erp_code', [
                'bBALNA1mckd7Zh4O',
                'bBALNA1mckh7QB4O',
                'bBAHNA1mckd5dh4O',
                'bBAHNA1mckd4dh4O',
                'bBAHNA1mckd7QB4O',
                'bBALNA1mckd7Zh4O'
            ]);
        }
        return ProductResource::collection($products->paginate(12));
    }
    
    /**
     * @OA\Get(
     *   tags={"Product"},
     *   path="/products/available/{product:erp_code}",
     *   summary="check available a product return boolean",
     *  @OA\Parameter(
     *          name="product:erp_code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string",
     *          )
     *  ),
     *   @OA\Response(
     *       response="default",
     *       description="successful operation",
     *      @OA\JsonContent()
     *   )
     * )
     */
    public function available(Product $product)
    {
        dd($product);
        if($product->isPurchasableProduct())
            return $this->success(null, 'The product is available');

        return $this->error('The product is inaccessible', 502);
    }



     /**
     * @OA\Get(
     *   tags={"Product"},
     *   path="/products/{product:erp_code}",
     *   summary="Show a product",
      *  @OA\Parameter(
      *          name="product:erp_code",
      *          required=true,
      *          in="path",
      *          @OA\Schema(
      *              type="string",
      *          )
      *  ),
     *   @OA\Response(
     *       response="default",
     *       description="successful operation",
      *      @OA\JsonContent()
     *   )
     * )
     */
    public function show(Product $product)
    {
        $product->increment('visit_count');
        return new ProductResource($product);
    }


    /**
     * @OA\Get(
     *     path="/products/category/{category:erp_code}/",
     *     tags={"Product"},
     *     summary="Get list products by main group code",
     *     @OA\Parameter(
     *          name="category:erp_code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="skip",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="count",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function getProductsByCategory(ProductRequest $request,MainGroup $mainGroup)
    {
        $products = Product::query()
            ->whereMainGroupCode(
                $mainGroup->erp_code
            )->where('few', '!=', '0')->orderByRaw("name DESC")->filter($request);
        return ProductResource::collection($products->paginate($request->get('count') ?? 16)->withQueryString());
    }

    /**
     * @OA\Get(
     *     path="/products/subcategory/{subcategory:erp_code}/",
     *     tags={"Product"},
     *     summary="Get list products by side group code",
     *     @OA\Parameter(
     *          name="subcategory:erp_code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="skip",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Parameter(
     *          name="count",
     *          required=false,
     *          in="query",
     *          @OA\Schema(
     *              type="integer",
     *          )
     *     ),
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function getProductsBySubCategory(ProductRequest $request,SideGroup $sideGroup)
    {
        $products = Product::query()
            ->whereSideGroupCode(
                $sideGroup->erp_code
            )->where('few', '!=', '0')->orderByRaw("name DESC")->filter($request);
        return ProductResource::collection($products->paginate($request->get('count') ?? 16)->withQueryString());
    }


    /**
     * @OA\Get(
     *     path="/vendors/products/{category:erp_code}",
     *     tags={"Vendor"},
     *     summary="List all products vendor",
     *     @OA\Parameter(
     *          name="category:erp_code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function getProductsVendorByCategory(Request $request, MainGroup $mainGroup)
    {
        $products = Product::query()
            ->whereMainGroupCode(
                $mainGroup->erp_code
            )->where('few', '!=', '0')->orderByRaw("name DESC")->filter($request);
        return ProductResource::collection($products->paginate($request->get('count') ?? 16)->withQueryString());
    }

}
