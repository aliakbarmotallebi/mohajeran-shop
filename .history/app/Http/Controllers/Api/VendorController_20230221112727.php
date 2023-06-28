<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\VendorResource;
use App\Models\MainGroup;


class VendorController extends Controller
{
    /**
     * @OA\Get(
     *     path="/vendors",
     *     tags={"Vendor"},
     *     summary="List all vendors",
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function index()
    {
        return VendorResource::collection(MainGroup::whereIsVendor(1)->latest('id')->get());
    }
    
}
