<?php

namespace App\Http\Controllers;

use App\Http\Resources\Services\InvoiceInfoResource;
use App\Models\Payment;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Temp;
use App\Models\Setting;
use App\Models\SideGroup;
use App\Models\Slider;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\WebhookService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Services\ProductService;
use App\Uilits\SMSTools;

class HomeController extends Controller
{

    public function index(Request $r)
    {


              
//         $p =Product::whereErpCode('bBAlOw5mckl4UB4O')->get();
// dd($p);
// dd(            $s = $service->find('dde2775b23dc3d4bf2ca9c15e755e621'));
        // $products = Product::whereRaw('LENGTH(side_group_code) >= 32')->get();
        // dd($products->count()); 
        // // 3409
    
        // foreach($products as $product){
        //     $s = $service->find('bBAHNA1mckd7QB4O');
        //     if ( isset($s['product']) ){
        //         if ( isset($s['product'][0]) ){
        //             if ( isset($s['product'][0]['SideGroupErpCode']) ){
        //                 $product->side_group_code = $s['product'][0]['SideGroupErpCode'];
        //                 $product->save();
        //             }
        //         }
        //     }
        // }

        // $temps = Temp::all();
        
        // foreach($temps as $temp){
        //     $product = Product::whereCode($temp->code)->first(); 
        //     if($product){
        //         $product->update([
        //             'image' => $temp->image,
        //             'other1' => $temp->other1,
        //             'other2' => $temp->other2,
        //             'other3' => $temp->other3,
        //             'other5' => $temp->other5,
        //             'other4' => $temp->other4
        //             ]);
        //         // $product->image = $temp->image;
        //         // $product->save();
        //     }
        // }

// dd($temps);
        // return redirect()->route('login');
        

        }
    
    public function privacy() {

                
            $checkPayment = Payment::whereResnumber('7fa65843-88e0-4f0f-8bac-a78c1d95382c');

            if($checkPayment->exists()){

                $checkPayment->update([
                    'status' => 'PAID'
                ]);
                
                // $checkPayment->wallet->update([
                //     'status' => 'STATUS_COMPLETED'
                // ]);
                
                dd($checkPayment->wallet);
            }
    }
}
