<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\ArrayManipulator\ArrayManipulator;
use App\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ValidProductScope;
use Pishran\LaravelPersianString\HasPersianString;
use Nicolaslopezj\Searchable\SearchableTrait;

class Temp extends Model
{
    use HasFactory, HasPersianString, SearchableTrait;

    protected $fillable = [
        'name',
        'few',
        'fewtak',
        'sell_price',
        'discount_price',
        'main_group_name',
        'side_group_name',
        'main_group_code',
        'side_group_code',
        'erp_code',
        'code',
        'image',
        'status',
        'visit_count',
        'available',
        'unit_erp_code',
        'is_special',
        'attr'
    ];

    protected $casts = [
        'attr' => 'array'
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'name' => 10,
            'side_group_name' => 5,
            'main_group_name' => 1,
            'code' => 1,
        ]
    ];


    protected $persianStrings = [
        'name',
        'main_group_name',
        'side_group_name',
    ];

    const STATUS_PUBLISH   = "PUBLISH";

    public function scopeFilter(Builder $builder, $request)
    {
        return (new ProductFilter($request))->apply($builder);
    }

    protected static function booted()
    {
        static::addGlobalScope(new ValidProductScope);
    }

    public function getImage()
    {
        if( ! $this->hasImage() )
            return asset('images/icon-no-image.png');

        return asset($this->image);
    }

    public function hasImage(): bool
    {
        return (bool) !(empty($this->image) || is_null($this->image));
    }

    public function isAvailable(): bool
    {
        return (bool)($this->available);
    }

    public function isSpecial(): bool
    {
        return (bool)($this->is_special);
    }

    public function isPublish(): bool
    {
        return (bool)($this->status == self::STATUS_PUBLISH);
    }

    public function hasSupply(): bool
    {
        return (bool)($this->fewtak > 0);
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'product_erp_code', 'erp_code')->collate('utf8mb4_bin');
    }

    public function hasSellPrice(): bool
    {
        return (bool)($this->sell_price > 0);
    }

    public function isPurchasableProduct(): bool
    {
        return (bool)(
            $this->isPublish() &&
            $this->isAvailable() &&
            $this->hasSupply() &&
            $this->hasSellPrice()
        );
    }

    public function getDiscountPriceAttribute($value)
    {
        if($value <= 10 ){
            return 0;
        }

        return substr($value, 0, -1);
    }

    public function getSellPriceAttribute($value)
    {
        if($value <= 10 ){
            return 0;
        }

        return substr($value, 0, -1);
    }


    public function getPrice(): int
    {
        return (int)($this->sell_price - $this->discount_price);
    }

    public function getPriceOriginal(): int
    {

        return (int)$this->getRawOriginal('sell_price');
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, 'erp_code', 'unit_erp_code')->collate('utf8mb4_bin');
    }

    public function category()
    {
        return $this->hasOne(MainGroup::class, 'erp_code', 'main_group_code');
    }

    public function subcategory()
    {
        return $this->hasOne(SideGroup::class, 'erp_code', 'side_group_code');
    }

    public function getMainGroupName()
    {
        return $this->main_group_name;
    }

    public function getSideGroupName()
    {
        return $this->side_group_name;
    }

    public function getUnitName()
    {
        if ( $this->unit()->exists() ){
            return $this->unit->name;
        }

        return "عدد";
    }


    public function getUnitFew()
    {
        if ( $this->unit()->exists() ){
            return $this->unit->few;
        }

        return 1;
    }
    
    

}
