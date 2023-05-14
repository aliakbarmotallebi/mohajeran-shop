<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            
            $table->id()->from(1000);
            
            $table->uuid('order_number');
        
            $table->boolean('is_suggest')
                ->default(false);

            $table->boolean('is_cancelled')
                ->default(false);

            $table->longText('customeraddress')
                ->nullable();

            $table->string('erp_code')->collate('utf8mb4_bin')
                ->index()
                ->nullable();

            $table->string('code')
                ->nullable();

            $table->string('customer_erp_code')->collate('utf8mb4_bin')
                ->index();

            $table->enum('shipping_method', [
                'TAXI',
                'NORMAL'
            ])->default('NORMAL');

            $table->enum('payment_method', [
                'WALLET',
                'HOME_DELIVERY'])
                ->default('HOME_DELIVERY');
    
            $table->enum('status', [
                'Pending',
                'Processing',
                'Rejected',
                'Completed'])
                ->default('Pending');

            $table->boolean('is_paid')
                ->default(0);

            $table->string('total_price')
                ->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
