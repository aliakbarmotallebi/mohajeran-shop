<?php

namespace App\Webhook;

use App\Exceptions\WebhookFailedException;
use Illuminate\Http\Request;

class WebhookProcessor {

    public $payload = [];

    private static $ACTION_UPDATE = 'UPDATE';

    private static $ACTION_CREATE = 'CREATE';

    private static $ACTION_DELETE = 'DELETE';

    protected Request $request;

    public function __construct(
        Request $request
    ) {
        if( $this->isJson($request->getContent()) ){
            throw WebhookFailedException::invalidJson();
        }

        $content = json_decode($request->getContent(), true);
        $this->payload = array_shift($content);
    }


    public function db(): string
    {
        return $this->payload['dbname'] ?? NULL;
    }

    public function table()
    {
        return $this->payload['tableName'] ?? NULL;
    }

    public function action(): string
    {
        return $this->payload['crudOperation'] ?? NULL;
    }

    public function fields(): array
    {
        return $this->payload['changedFields'] ?? NULL;
    }

    public function isActionUpdated(): bool
    {
        return (bool)($this->action() == self::$ACTION_UPDATE);
    }

    public function isActionCreated(): bool
    {
        return (bool)($this->action() == self::$ACTION_CREATE);
    }

    public function isActionDeleted(): bool
    {
        return (bool)($this->action() == self::$ACTION_DELETE);
    }

    private function isJson(string $string) 
    {
        json_decode($string, true);
        return json_last_error() != JSON_ERROR_NONE;
    }
}

