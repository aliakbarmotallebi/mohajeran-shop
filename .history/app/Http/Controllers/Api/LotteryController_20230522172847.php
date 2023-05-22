<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function current(Request $request)
    {
        $lottery = Lottery::latest()->
    }

    public function index(Request $request)
    {
        $lottereis = Lottery::latest()->all();
        return LotteryResource::collection($lottereis);
    }
}
