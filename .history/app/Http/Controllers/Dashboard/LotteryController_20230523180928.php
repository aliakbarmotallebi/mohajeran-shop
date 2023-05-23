<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    public function index(Request $request)
    {
        $lotteries = Lottery::latest()->get();
        return view('dashboard.lotteries.index', compact('lotteries'));
    }

    public function edit(Request $request, Lottery $lottery)
    {
        return view('dashboard.lotteries.edit', compact('lottery'));
    }
}
