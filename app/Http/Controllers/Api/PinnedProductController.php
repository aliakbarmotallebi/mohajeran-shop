<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PinnedProduct;
use App\Http\Resources\PinnedProductResource;
use Illuminate\Http\Request;

class PinnedProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/pinneds/products",
     *     tags={"Slideshow"},
     *     summary="List product pinned slideshow",
     *     @OA\Parameter(
     *          name="section",
     *          required=true,
     *          description="SLIDER1~10",
     *          in="query",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function index(Request $request)
    {
        $products = PinnedProduct::query()
            ->whereCondition(
                $request->get('section')
            )->whereHas('product', function ($query) {
    return $query->where('few', '!=', 0);
})->orderByRaw("weight DESC");
        return PinnedProductResource::collection($products->get());
    }
}
