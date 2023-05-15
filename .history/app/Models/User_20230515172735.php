<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\SmsVerification;
use Carbon\Carbon;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SmsVerification;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
        'tel',
        'mobile',
        'zip_code',
        'address',
        'erp_code',
        'is_black_list',
        "addresses"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'verification_code',
        'remember_token',
    ];
    
    protected $casts = [
        'code_expired_at' => 'datetime:Y-m-d H:00',
        'addresses' => 'json'
    ];

    /**
     *
     */
    const ROLE_ADMIN  = "Admin";

    /**
     *
     */
    const ROLE_USER   = "Customer";


    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'mobile' => $this->mobile,
            'name' => $this->name,
        ];
    }

//    public function getAuthPassword(){
//        return $this->Password;
//    }

    public function callToVerify()
    {
        $code = '11111'; #random_int(100000, 999999);

        $this->forceFill([
            'verification_code' => $code,
            'code_expired_at' => Carbon::now()
        ])->saveQuietly();

        $this->sendCode($code);
    }

    public function isEmptyName(): bool
    {
        return (bool)( empty($this->name) || is_null($this->name) );
    }

    public function isEmptyZipCode(): bool
    {
        return (bool)( empty($this->zip_code) || is_null($this->zip_code) );
    }

    public function isEmptyAddress(): bool
    {
        return (bool)( empty($this->address) || is_null($this->address) );
    }

    public function isProfileComplete(): bool
    {
        return (bool) (
            !$this->isEmptyName() &&
            !$this->isEmptyAddress()
        );
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return (bool)($this->role == self::ROLE_ADMIN);
    }

    /**
     * @return bool
     */
    public function isUser(): bool
    {
        return !$this->isAdmin();
    }


    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function wallets()
    {
        return $this->hasMany(Wallet::class);
    }

    public function getNameAttribute($name)
    {
        if( $name == "{$this->mobile}_" 
            || $name == $this->mobile ){
            return NULL;
        }
            
        return $name;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    private function updateDefaultAddresses($address)
    {
        $addresses = $this->addresses ?? [];
        $default = [ 0 => $address ];
        $this->addresses = [...$default, ...$addresses];
        $this->save();
    }
    
    public function setTelAttribute($value)
    {
        $this->attributes['tel'] = convert2english($value);
    }

    public function setMobileAttribute($value)
    {
        $this->attributes['mobile'] = convert2english($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = convert2english(
            str_replace("،" , "," , $value)
        );
        
        $this->updateDefaultAddresses(convert2english(
            str_replace("،" , "," , $value)
        ));
    }

    public function orders()
    {
        return Order::whereCustomerErpCode($this->erp_code);
    }

    public function isBlocked(): bool
    {
        return (bool)($this->is_black_list);
    }

    public function isEmptyErpCode()
    {
       return empty($this->erp_code) || is_null($this->erp_code);
    }
    
    /**
     * Save the model without firing any model events
     *
     * @param array $options
     *
     * @return mixed
     */
    public function createWithoutEvents(array $options = [])
    {
        return static::withoutEvents(function () use ($options) {
            return $this->create($options);
        });
    }

    /**
     * Update the model without firing any model events
     *
     * @param array $attributes
     * @param array $options
     *
     * @return mixed
     */
    public function updateWithoutEvents(array $attributes = [], array $options = [])
    {
        return static::withoutEvents(function () use ($attributes, $options) {
            return $this->update($attributes, $options);
        });
    }
    
    public function limitStr($string = '')
    {
         return (strlen($string) > 0) ? substr($string,0,20).'...' : $string;
    }

    public function getAddressLimit() {
        $this->limitStr($this->address);
    }
    
    public function stringToSecret(string $string = NULL)
    {
        if (!$string) {
            return NULL;
        }
        $length = strlen($string);
        $visibleCount = (int) round($length / 4);
        $hiddenCount = $length - ($visibleCount * 2);
        return substr($string, 0, $visibleCount) . str_repeat('*', $hiddenCount) . substr($string, ($visibleCount * -1), $visibleCount);
    }
}
