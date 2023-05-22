<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WalletResource;
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

        $wallets = $request->user()->wallets()->latest()->get();
        return WalletResource::collection($wallets);
    }
        /**
     * @OA\Get(
     *   tags={"Wallet"},
     *   path="/wallets/{amount}",
     *   summary="List all Wallets self user",
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(
     *       response="default",
     *       description="successful operation",
     *      @OA\JsonContent()
     *   )
     * )
     */
    public function incrementalBalance(Request $request)
    {

        
    }

}
