<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $payments_query = Payment::query();

        if($request->filled('status')){
            $payments_query = $payments_query->whereStatus($request->query('status'));
        }

        if($request->filled('mobile')){
            $payments_query = $payments_query->whereHas('user', function($q) use($request){
                $q->whereMobile($request->query('mobile'));
            });
        }

        if($request->filled('fullname')){
            $payments_query = $payments_query->whereHas('user', function($q) use($request){
                $q->where('fullname', 'like', '%'.$request->query('fullname').'%');
            });
        }

        $payments = $payments_query->latest()->paginate();
        return view('dashboard.pages.payments', compact('payments'));
    }
}
