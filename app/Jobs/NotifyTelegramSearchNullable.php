<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyTelegramSearchNullable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $keyword;
    
    protected string $token = "5772792824:AAEgBHVnGnnnUgUSCBfH7mGbca2kOsMGESE";
    
    protected string $chatId = "-1001527779077";

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($keyword)
    {
        
        $this->keyword = $keyword;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $message = "
             🔎 #کلمه \n
            کلمه یافت نشده => {$this->keyword} \n
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
