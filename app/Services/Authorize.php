<?php namespace App\Services;

use App\Settings\SettingStorage;
use Carbon\Carbon;

class Authorize extends Holoo
{
    /**
     * Service Method for Login
     */
    static  $API_LOGIN  = 'Login';

    /**
     *  Username Login to holooo
     */
    static  $USERNAME   = 'web';

    /**
     * Password Login to holooo
     */
    static  $USER_PASS   = 'MQ==';

    /**
     *  Datebase name Login to holooo
     */
    static  $DB_NAME     = 'Holoo1';


    static  $SETTING_TOKEN_SERVICE    = 'TOKEN_SERVICE';
    
    
    static $SETTING_END_OF_LIFE_TOKEN = 'END_OF_LIFE_TOKEN';
    
    
    protected $data = [];

    protected SettingStorage $setting;


    public function __construct(SettingStorage $setting)
    {
       parent::__construct();

       $this->setting = $setting;
    }


    private function hasExpired(): bool
    {
        return (bool)(Carbon::now()->greaterThan($this->getEndOfLife()));
    }

    private function getEndOfLife()
    {
        return $this->setting->get(self::$SETTING_END_OF_LIFE_TOKEN) ?? Carbon::now()->subMinute();
    }

    private function isTokenNull()
    {
        return (bool) is_null($this->setting->get(self::$SETTING_TOKEN_SERVICE));
    }

    protected function requestRequestToken()
    {
        if( $this->hasExpired() || $this->isTokenNull() ) {
            return $this->getApiToken();
        }
        return $this->setting->get(self::$SETTING_TOKEN_SERVICE);
    }

    private function getApiToken()
    {
        $request = $this->setPostUrl(self::$API_LOGIN)
        ->setData([
                'headers'     => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Accept'       => 'application/json',
                ],
                'form_params'  =>  [
                    'username' => self::$USERNAME,
                    'userpass' => self::$USER_PASS,
                    'dbname'   => self::$DB_NAME
                ]
            ])
        ->execute();

        if(  isset($request["Login"]) ) {

            $token = $request["Login"]['Token'] ?? NULL;

            $this->setting->set(self::$SETTING_TOKEN_SERVICE, $token );
            $this->setting->set(self::$SETTING_END_OF_LIFE_TOKEN, Carbon::now()->addMinutes(60) );

            return $token;
        }

        return null;
    }


}
