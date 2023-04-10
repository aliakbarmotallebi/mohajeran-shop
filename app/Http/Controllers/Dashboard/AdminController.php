<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(30);
        $sliders = Slider::latest()->take(3)->get();
        return view('dashboard.index', compact('products','sliders'));
    }
}
