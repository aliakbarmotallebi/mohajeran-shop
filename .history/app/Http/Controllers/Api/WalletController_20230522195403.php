<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WalletResource;
use Illuminate\Http\Request;
use App\PaymentProcessor\Facades\PaymentManager;
use App\Facades\TransactionWalletManager;
use App\Traits\ApiResponser;

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

        $deposit = TransactionWalletManager::deposit(
            amount: $amount,
            user: $request->user,
        );

        $payment =  PaymentManager::setDeriver('AsanPardakhat')
            ->setPaymentable($deposit)
            ->createRequest();
        
        if($payment->request()) {
            // $deposit->payment()->create([
            //     'resnumber' => $payment->getResnumber(),
            //     'bank_name' => 'AsanPardakhat',
            //     'amount' => $deposit->getAmountPay(),
            //     'user_id' => $user->id,
            // ]);
                      
            return $this->success([
                'section' => 'PAYMENT',
                'redirectToUrl' => $payment->redirect()
            ], 'اتصال به در گاه بانکی...');
        }

        return $this->error('خطا در اتصال به درگاه بانکی', 400);
    }

}
