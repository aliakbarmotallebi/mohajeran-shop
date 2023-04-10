<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinnedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinned_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->collation('utf8mb4_bin');
            $table->string('product_erp_code')->collation('utf8mb4_bin');
            $table->integer('weight') 
                ->default(0);
            $table->enum('condition', [
                'SLIDER1',
                'SLIDER2',
                'SLIDER3',
                'SLIDER4',
                'SLIDER5',
                'SLIDER6',
                'SLIDER7',
                'SLIDER8',
                'SLIDER9',
            ]);
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
        Schema::dropIfExists('pinned_products');
    }
}
