<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Resources\BannerResource;

class BannerController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Banner"},
     *   path="/banners/",
     *   summary="all banners group status",
     *   @OA\Response(
     *       response="default",
     *       description="successful operation",
     *      @OA\JsonContent()
     *   )
     * )
     */
    public function index(){

        $banners = Banner::groupBy('status')->latest()->get();
        return BannerResource::collection($banners);
    }
}
