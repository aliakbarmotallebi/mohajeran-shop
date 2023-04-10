<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResource;
use App\Models\Slider;


class SliderController extends Controller
{
    /**
     * @OA\Get(
     *     path="/sliders",
     *     tags={"Slider"},
     *     summary="List all Slider",
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function __invoke()
    {
        return SliderResource::collection(Slider::latest()->get());
    }
}
