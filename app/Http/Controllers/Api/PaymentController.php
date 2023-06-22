<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use ApiResponser;
    /**
     * @OA\Get(
     *   tags={"Payment"},
     *   path="/payments/self",
     *   summary="List all Payments self user",
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
    
    /**
     * @OA\Get(
     *   tags={"Payment"},
     *   path="/payments/callback",
     *   summary="payments callback",
     *   @OA\Response(
     *       response="default",
     *       description="successful operation",
     *      @OA\JsonContent()
     *   )
     * )
     */
     public function callback(Request $request)
    {
        $trans_id = $request->get('trans_id') ?? 0;
        $amount = $request->get('amount') ?? 0;
        
        $trans = $this->nx($trans_id, $amount);
            $trans = json_decode($trans, true);
            
        if(($trans['code'] ?? 0) == "0") {
                
            $checkPayment = Payment::whereResnumber($trans_id);

            if($checkPayment->exists()){
                $payment = $checkPayment->latest()->first();
                $payment->update([
                    'status' => 'PAID'
                ]);
                
                $payment->wallet->update([
                    'status' => 'STATUS_COMPLETED'
                ]);

                
                return $this->success(
                 new PaymentResource($payment),
        'گزارش پرداختی آنلاین انجام شده');
            }
        }
        
          return $this->error(
                    'مشکل در پرداخت صورت گرفته است مبلغ بازگرداننده شد',
                    400);
    }
    
    
    private function nx($trans_id, $amount){
        try {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://nextpay.org/nx/gateway/verify',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => "api_key=7b22cce6-19e3-40ff-8a61-1709d477bc2a&amount={$amount}&trans_id={$trans_id}",
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
        } catch (Exception $e) {
            return false;
        }
    }
}
