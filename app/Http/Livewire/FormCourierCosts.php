<?php

namespace App\Http\Livewire;

use App\Services\ProductService;
use App\Settings\SettingStorage;
use Livewire\Component;

class FormCourierCosts extends Component
{
    private $settings;

    public $min_amount;

    public $code;

    protected $rules = [
        'min_amount' => 'required|numeric',
        'code'    => 'required|numeric',
    ];

    public function mount()
    {
        $this->min_amount = settings('MIN_ORDER_AMOUNT');
    }

    public function handle()
    {
        $this->validate();

        $this->settings = app(SettingStorage::class);

        $product = app(ProductService::class)->barcode($this->code);

        if(! isset($product['product']) ){
            return 0;
        }

        $this->settings->set('MIN_ORDER_AMOUNT', $this->min_amount);

        if($this->settings->get('MIN_ORDER_AMOUNT') <= 0 ){
            return 0;
        }

        $cost = $product['product'][0]['SellPrice'] ?? 20000;
        
        $this->settings->set([
            'ERPCODE_COURIER_COST' => $product['product'][0]['ErpCode'],
            'PRICE_COURIER_COST'   => $this->setCost($cost)
        ]);
    }
    
    public function setCost($cost)
    {
        if($cost <= 10 ){
            return 0;
        }

        return substr($cost, 0, -1);
    }
    
    public function render()
    {
        return view('livewire.form-courier-costs');
    }
}
