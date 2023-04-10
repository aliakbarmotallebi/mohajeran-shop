<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;


class NotifyTelegramOrderCreated implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Order $order;
    
    protected string $token = "5772792824:AAEgBHVnGnnnUgUSCBfH7mGbca2kOsMGESE";
    
    protected string $chatId = "-1001527779077";

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $created = verta($this->order->created_at)->format('H:i Y-m-d');
        $total = number_format($this->order->getTotal());
        
        $message = "
           ✅ سفارش جدید \n
            قیمت کل => {$total} \n
            تعداد ارقام => {$this->order->items->count()} \n
            نام سفارش دهنده => {$this->order->user->name} \n
            شماره تماس => {$this->order->user->mobile} \n 
            تاریخ ایجاد سفارش => {$created} \n
        ";
        
        $this->sendMessage($message);
    }
    
    public function sendMessage($message) 
    {
        $url = "https://api.telegram.org/bot" . $this->token . "/sendMessage?chat_id=" . $this->chatId;
        $url = $url . "&text=" . urlencode($message);
        $ch = curl_init();
        $optArray = array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

