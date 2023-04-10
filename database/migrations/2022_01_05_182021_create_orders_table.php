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
        
            $table->string('erp_code')
                ->index()
                ->nullable();

            $table->string('code')
                ->nullable();

            $table->string('customer_erp_code')
                ->index();

            $table->enum('status', [
                'Pending',
                'Processing',
                'Rejected',
                'Completed'])
                ->default('Pending');

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
