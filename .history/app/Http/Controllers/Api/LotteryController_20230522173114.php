<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LotteryResource;
use App\Models\Lottery;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function current(Request $request)
    {
        $date = \Carbon\Carbon::today();
        $lottery = Lottery::latest()->where('end_at','>=',$date)->get();
        return new LotteryResource($lottery);
    }

    public function index(Request $request)
    {
        $lottereis = Lottery::latest()->all();
        return LotteryResource::collection($lottereis);
    }
}
