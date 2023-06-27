<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        $wallets_query = Wallet::query();

        if($request->filled('status')){
            $wallets_query = $wallets_query->whereType($request->query('status'));
        }

        if($request->filled('mobile')){
            $wallets_query = $wallets_query->whereHas('user', function($q) use($request){
                $q->whereMobile($request->query('mobile'));
            });
        }

        if($request->filled('fullname')){
            $wallets_query = $wallets_query->whereHas('user', function($q) use($request){
                $q->where('name', 'like', '%'.$request->query('fullname').'%');
            });
        }

        $wallets = [];
        $wallets['List'] = $wallets_query->latest()->paginate(15);
        $wallets['Deposit'] = $wallets['List']->where('status', 'STATUS_COMPLETED')->sum('amount');
        $wallets['Withdraw'] = $wallets['List']->where('status', 'STATUS_REJECTED')->sum('amount');
        $wallets['Valid'] = $wallets['List']->sum('amount'); 

        return view('dashboard.wallet.index',
            compact('wallets')
        );
    }
}
