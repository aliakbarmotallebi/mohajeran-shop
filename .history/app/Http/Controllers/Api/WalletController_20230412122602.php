<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Wallet"},
     *   path="/wallets/self",
     *   summary="List all Wallets self user",
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(
     *       response="default",
     *       description="successful operation",
     *      @OA\JsonContent()
     *   )
     * )
     */
    public function index(Request $request){

        $payments = $request->user()->payments()->latest()->get();
        return PaymentResource::collection($payments);
    }
}
