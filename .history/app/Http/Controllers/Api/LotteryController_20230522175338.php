<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LotteryResource;
use App\Models\Lottery;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    use ApiResponser;
    /**
     * @OA\Get(
     *   tags={"Lottery"},
     *   path="/lottery/current",
     *   summary="Lottery current",
     *   @OA\Response(response=201, description="create token the jwt", @OA\JsonContent()),
     *   @OA\Response(response=422, description="Invalid login credentials", @OA\JsonContent())
     * )
     */

    public function current(Request $request)
    {
        $date = \Carbon\Carbon::now();
        $lottery = Lottery::latest()->first();
        return 
        $this->success(
            new LotteryResource($lottery));
    }

    /**
     * @OA\Get(
     *   tags={"Lottery"},
     *   path="/lotteries",
     *   summary="Lottery Past",
     *   @OA\Response(response=201, description="create token the jwt", @OA\JsonContent()),
     *   @OA\Response(response=422, description="Invalid login credentials", @OA\JsonContent())
     * )
     */
    public function index(Request $request)
    {
        $lottereis = Lottery::latest()->all();
        return $this->success(
            LotteryResource::collection($lottereis));
    }
}


