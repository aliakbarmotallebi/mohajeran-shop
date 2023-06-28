<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PinnedProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PinnedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = PinnedProduct::query()
            ->groupBy('condition')
            ->select('*', DB::raw('count(*) as total'), )
            ->get();
        return view('dashboard.pinneds.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.pinneds.create'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'condition'=>'required',
            'weight'=>'required|integer',
            'code'=>'required|exists:products,code',
        ]);

        $product = new PinnedProduct;
        $product->condition = $request->get('condition');
        $product->weight = $request->get('weight');
        $product->code = $request->get('code');
        $product->product_erp_code = Product::whereCode($request->get('code'))->first()->erp_code ?? NULL;
        $product->name = Product::whereCode($request->get('code'))->first()->name ?? NULL;
        $product->save();
        return redirect()->route('dashboard.pinned_products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PinnedProduct  $pinnedProduct
     * @return \Illuminate\Http\Response
     */
    public function showProducts(Request $request, $condition)
    {
        $products = PinnedProduct::whereCondition($condition)->latest('weight')->get();
        if(!empty($products)){
            return view('dashboard.pinneds.show', compact('products')); 
        }

        return redirect()->route('dashboard.pinned_products.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PinnedProduct  $pinnedProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(PinnedProduct $pinnedProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PinnedProduct  $pinnedProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PinnedProduct $pinnedProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PinnedProduct  $pinnedProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(PinnedProduct $pinnedProduct)
    {
        $pinnedProduct->delete();
        return redirect()->route('dashboard.pinned_products.index');
    }
}
