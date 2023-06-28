<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\MainGroup;


class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/category",
     *     tags={"Category"},
     *     summary="List all Categories",
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function index()
    {

        return CategoryResource::collection(MainGroup::where('is_vendor', 0)->with('subcategories')->where('is_disabled', 0)->latest('id')->get());
    }
}
