<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WalletResource;
use Illuminate\Http\Request;
use App\PaymentProcessor\Facades\PaymentManager;
use App\Facades\TransactionWalletManager;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\DB;

class WalletController extends Controller
{

    use ApiResponser;
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
     *    @OA\Parameter(
     *          name="amount",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string",
     *          )
     *     ),
     *   security={{"bearerAuth":{}}},
     *   @OA\Response(
     *       response="default",
     *       description="successful operation",
     *      @OA\JsonContent()
     *   )
     * )
     */
    public function incrementalBalance(Request $request, string $amount)
    {
        if((int)$amount < 1000){
            return $this->error(
                'حداقل مقدار باید ۱۰۰۰ تومان باشد', 422
            );
        }
        // DB::beginTransaction();

        // try {
            $deposit = TransactionWalletManager::deposit(
                amount: $amount,
                user: $request->user(),
            );

            $trans = $this->nx($deposit->id, $deposit->getAmountPay());
            $trans = json_decode($trans, true);
            
            if(($trans['code'] ?? 0) == "-1") {
                $deposit->payment()->create([
                    'resnumber' => $trans['trans_id'],
                    'bank_name' => 'NextPay',
                    'amount' => $deposit->getAmountPay(),
                    'user_id' => $request->user()->id,
                ]);
                          
                return $this->success([
                    'section' => 'PAYMENT',
                    'redirectToUrl' => "https://nextpay.org/nx/gateway/payment/".$trans['trans_id']
                ], 'اتصال به در گاه بانکی...');
            }

        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollback();
        // }

        return $this->error('خطا در اتصال به درگاه بانکی', 400);
    }
    
    
    
    private function nx($order, $amount){
        try {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://nextpay.org/nx/gateway/token',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "api_key=7b22cce6-19e3-40ff-8a61-1709d477bc2a&amount={$amount}&order_id={$order}&callback_uri=https://mohajeran.shop/index/callback",
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
        } catch (Exception $e) {
            return false;
        }
    }

}
