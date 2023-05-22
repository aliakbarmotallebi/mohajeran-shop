<?php

namespace App\Http\Controllers;

use App\Http\Resources\Services\InvoiceInfoResource;
use App\Models\Order;
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

class HomeController extends Controller
{

    public function index(Request $r)
    {


        dd(env('JWT_BLACKLIST_ENABLED'));

              
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
        

// return $this->SendArray(
//     '3982',
//     '38624080hli/.',
//     ['09306193414'],
//     'test api',
//     '90009364',
//     '',
//     ''
//     );
        // return view('index');
        
        // $data = OrderItem::with('product')->whereHas('product', function($q){
        //     return $q->where('main_group_code','bAAbfg==');
        // })->get();
        
        // return $data;
    }
    
    public function privacy() {
        return view('privacy');
    }
    
    function get_data($Data) {

        $url = "https://sms.sunwaysms.com/smsws/httpservice.ashx?";
         $ch = curl_init();
         curl_setopt($ch, CURLOPT_URL, $url . $Data);
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20000000);
         $data = curl_exec($ch);
         curl_close($ch);
        return $data;
    }
    
    function SendArray($UserName, $Password, $RecipientNumber, $Message, $SpecialNumber, $IsFlash, $CheckingMessageID) {
        $Number = "";
        $chkMessageID = "";
        foreach ($RecipientNumber as $item) {
            $Number = $Number . $item . ",";
        }

         return $this->get_data("service=sendarray&UserName=" . urlencode($UserName) . "&Password=" . urlencode($Password) . "&To=" . urlencode(rtrim($Number,",")) . "&Message=" . urlencode($Message) .
         "&From=" . urlencode($SpecialNumber) . "&Flash=" . urlencode(($IsFlash ? "true" : "false")));
    }
}
