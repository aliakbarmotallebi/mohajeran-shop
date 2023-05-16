<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Carbon\Carbon;

class AppController extends Controller
{
    use ApiResponser;

    /**
     * @OA\Get(
     *   tags={"App"},
     *   path="/app/version",
     *   summary="APP Version",
     *   @OA\Response(response=201, description="create token the jwt", @OA\JsonContent()),
     *   @OA\Response(response=422, description="Invalid login credentials", @OA\JsonContent())
     * )
     */
    public function version(Request $request){
        return $this->success(
                 settings('APP_VERSION', 21),
        'The code version app ');
    }
    
    /**
     * @OA\Get(
     *   tags={"App"},
     *   path="/app/working-time",
     *   summary="APP WORKING_TIME",
     *   @OA\Response(response=201, description="create token the jwt", @OA\JsonContent()),
     *   @OA\Response(response=422, description="Invalid login credentials", @OA\JsonContent())
     * )
     */
    public function workingTime(Request $request){
        return $this->success(
                 settings('WORKING_TIME'),
        'WORKING_TIME');
    }
    
    /**
     * @OA\Get(
     *   tags={"App"},
     *   path="/app/instant-messagings",
     *   summary="APP INSTANT_MESSAGINGS",
     *   @OA\Response(response=201, description="create token the jwt", @OA\JsonContent()),
     *   @OA\Response(response=422, description="Invalid login credentials", @OA\JsonContent())
     * )
     */
    public function instantMessagings(Request $request){
        $startDate = Carbon::createFromFormat('H:i', settings('INSTANT_MESSAGINGS_START'));
        $endDate = Carbon::createFromFormat('H:i', settings('INSTANT_MESSAGINGS_END'))->addDay();
  
  


        if(settings()->get('INSTANT_MESSAGINGS')){
            $check = Carbon::now()->between($startDate, $endDate, true);
      
            if($check){
                
                
                $settings = settings('INSTANT_MESSAGINGS');
                
                if(is_null($settings)){
        
                    throw new \Exception("null");
                }
                
                return $this->success(settings('INSTANT_MESSAGINGS'), 'INSTANT_MESSAGINGS');
            }
            
            
        }
        
        $settings = settings('INSTANT_MESSAGINGS_DEFAULT');
        
        if(is_null($settings)){
            
            throw new \Exception("null");
        }
        
        
        return $this->success(settings('INSTANT_MESSAGINGS_DEFAULT'));
    }
    
    /**
     * @OA\Get(
     *   tags={"App"},
     *   path="/app/min-order-amount",
     *   summary="APP MIN_ORDER_AMOUNT",
     *   @OA\Response(response=201, description="create token the jwt", @OA\JsonContent()),
     *   @OA\Response(response=422, description="Invalid login credentials", @OA\JsonContent())
     * )
     */
    public function minOrderAmount(Request $request){
        return $this->success(
                 settings('MIN_ORDER_PRICE'),
        'MIN_ORDER_PRICE');
    }


    /**
     * @OA\Get(
     *   tags={"App"},
     *   path="/app/slider-vip",
     *   summary="APP slider",
     *   @OA\Response(response=201, description="create token the jwt", @OA\JsonContent()),
     *   @OA\Response(response=422, description="Invalid login credentials", @OA\JsonContent())
     * )
     */
    public function sliderVip(Request $request){
        \Artisan::call('optimize');
        return $this->success([
            'image' => settings('SLIDER_IMAGE'),
            'title' => settings('SLIDER_TITLE'),
            'color' => settings('SLIDER_COLOR'),
        ]);
    }
    
    
        /**
     * @OA\Get(
     *     path="/app/transportation-cost",
     *     tags={"App"},
     *     summary="Order transportation cost",
     *     @OA\Response(response="200", description="", @OA\JsonContent()),
     *     @OA\Response(response=400, description="Bad request", @OA\JsonContent()),
     * )
     */
    public function transportationCost()
    {
        return [
            'min_order_amount'   => settings('MIN_ORDER_AMOUNT') ?? 0,
            'price_courier_cost' => settings('PRICE_COURIER_COST') ?? 0,
            'taxiـfare' => '7000',
            'transportationـcost' => [
                50 => 1000,
                40 => 2000,
                30 => 3000,
                20 => 4000,
                10 => 5000,
            ]
        ];
    }
}
