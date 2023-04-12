<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
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
}
