<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function __invoke(Request $request)
    {
        $sliders = Slider::latest()->get();
        return view('dashboard.settings.sliders', compact('sliders'));
    }
}
