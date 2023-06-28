<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SideGroup;
use App\Models\MainGroup;
use App\Http\Resources\SubCategoryResource;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/subcategories",
     *     tags={"SubCategory"},
     *     summary="List all Categories",
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function index()
    {
        return SubCategoryResource::collection(SideGroup::latest()->whereHas('category', function($q){
            $q->where('is_disabled', 0);
        })->get());
    }


    /**
     * @OA\Get(
     *     path="/subcategories/category/{category:erp_code}",
     *     tags={"SubCategory"},
     *     @OA\Parameter(
     *          name="category:erp_code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *     summary="List all subCategories by category",
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function getSubCategoriesByCategoryErpCode(Request $request, MainGroup $mainGroup)
    {
        $subcategories = SideGroup::whereMainErpCode(
                $mainGroup->erp_code)->whereHas('category', function($q){
                    $q->where('is_disabled', 0);
                });
        return SubCategoryResource::collection($subcategories->get());
    }
}
