<?php

namespace App\Http\Controllers;

use App\Exceptions\WebhookFailedException;
use Illuminate\Http\Request;
use App\Http\Requests\WebHookRequest;
use App\Http\Middleware\EnsureValidSignatureWebHook;
use App\Webhook\WebhookProcessor;
use App\Models\Log;

class WebHookController extends Controller
{

    public function __construct()
    {
        //$this->middleware(EnsureValidSignatureWebHook::class);
    }

    public function __invoke(Request $request)
    {
        Log::query()->delete();
       Log::insert([
            'message' => $request->getContent()
       ]);
        
        $webhook = new WebhookProcessor($request);

        $webhook->table();

        $jobClasses = $this->jobClass();

        $jobClass = $webhook->table();

        if (! isset($jobClasses[$jobClass]) ) {
            return;
        }

        if (! class_exists($jobClasses[$jobClass])) {
            throw WebhookFailedException::jobClassDoesNotExist($jobClasses[$jobClass]);
        }

        dispatch(new $jobClasses[$jobClass]($webhook));
    }


    private function jobClass()
    {
        return [
            'product'  => \App\Jobs\Webhook\HandleDataProduct::class,
            'customer' => \App\Jobs\Webhook\HandleDataCustomer::class,
            'mainGroup'  => \App\Jobs\Webhook\DataMainGroup::class,
            'sideGroup' => \App\Jobs\Webhook\DataSideGroup::class,
        ];
    }
}
