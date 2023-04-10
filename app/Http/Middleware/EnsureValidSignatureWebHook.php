<?php

namespace App\Http\Middleware;

use App\Exceptions\WebhookFailedException;
use Closure;
use Illuminate\Http\Request;

class EnsureValidSignatureWebHook
{
    private static $shouldIP     = '109.122.229.110';

    private static $shouldSecret = '123456789';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(! $this->isMatchIPAddress($request) )
        {
            throw WebhookFailedException::notMatchIPAddress();
        }

        $secret = $request->header('apikey');

        if (! $secret ) {
            throw WebhookFailedException::missingSecret();
        }

        if (! $this->isValidSecret($secret)) {
            throw WebhookFailedException::invalidSecret($secret);
        }

        return $next($request);
    }

    protected function isValidSecret(string $secret): bool
    {
        if ( empty($secret) ) {
            throw WebhookFailedException::signingSecretNotSet();
        }

        return (bool)(self::$shouldSecret == $secret);
    }

    protected function isMatchIPAddress(Request $request): bool
    {
        $ipadr = ip2long($request->ip());
        $ip    = ip2long(self::$shouldIP);

        return (bool)($ipadr == $ip);
    }
}
