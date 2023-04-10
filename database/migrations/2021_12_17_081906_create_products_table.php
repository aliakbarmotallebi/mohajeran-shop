<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name')
                ->nullable();

            $table->bigInteger('few')
                ->nullable()
                ->default(0);

            $table->bigInteger('fewtak')
                ->nullable()
                ->default(0);

            $table->string('sell_price')
                ->nullable()
                ->default(0);

            $table->string('discount_price')
                ->nullable()
                ->default(0);

            $table->string('main_group_name')
                ->nullable();

            $table->string('side_group_name')
                ->nullable();

            $table->string('main_group_code')
                ->index()
                ->collate('utf8_bin')
                ->nullable();

            $table->string('side_group_code')
                ->index()
                ->collate('utf8_bin')
                ->nullable();

            $table->string('erp_code')
                ->index()
                ->collate('utf8_bin');

            $table->longText('code') //barcode
                ->nullable();

            $table->longText('image')
                ->nullable();

            $table->longText('unit_erp_code')
                ->nullable();

            $table->bigInteger('visit_count')
                ->default(0);

            $table->boolean('available')
                ->default(1);

            $table->boolean('is_special')
                ->default(0);

            $table->json('attr')
                ->nullable();

            $table->enum('status', [
                'UN_PUBLISH',
                'PUBLISH'
            ])->default('PUBLISH');

            $table->timestamps();
        });

        Product::create([
            'name'            => 'name product',
            'few'             => 10,
            'sell_price'      => 15000,
            'main_group_name' => 'category',
            'side_group_name' => 'subcategory',
            'main_group_code' => 'CategoryCode',
            'side_group_code' => 'SubcategoryCode',
            'erp_code'        => 'ProductCode'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
