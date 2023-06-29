<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SideGroup;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::query();

        if ($request->filled('search')) {
            $products = $products->search($request->get('search'), null, true);
        }

        if ($request->filled('category')) {
            $products = $products->whereSideGroupCode(
                $request->get('category')
            );
        }

        if ($request->filled('filter')) {
            $f = $request->get('filter');
            if ($f == 1) {
                $products = $products->whereIsSpecial(
                    true
                );
            }
            if ($f == 2) {
                $products = $products->whereNull(
                    'image'
                );
            }
            if ($f == 3) {
                $products = $products->whereNull(
                    'image'
                )->orderBy(
                    'few',
                    'DESC'
                );
            }
        }

        if($request->user()->isVendor()){
            $products = $products->whereHas('category', function($q) use($request){
                $q->where('owner_id', $request->user()->id);
            });
        }

        $products = $products->latest()->paginate(32);

        $subcategories = SideGroup::query();

        if($request->user()->isVendor()){
            $subcategories = $subcategories->whereHas('category', function($q) use($request){
                $q->where('owner_id', $request->user()->id);
            });
        }

        $subcategories = $subcategories->latest('name')->get();

        return view('dashboard.products.index', compact('products', 'subcategories'));
    }
    
    
    public function edit(Product $product){
        $units = Unit::get();
        return view('dashboard.products.edit', compact('product', 'units'));
        
        
    }
    
    public function update(Request $request, Product $product){
        
        $request->validate([
            'name' => 'required',
            'few' => 'required',
            'fewtak' => 'required',
            'sell_price' => 'required',
            'discount_price' => 'required',
            'unit_erp_code' => 'required',
        ]);
        
        $product->update($request->all());
        alert()->success('اطلاعات سیستم با موفقیت تغییر یافت');
        return redirect()->route('dashboard.products.index');
        
        
    }
}
