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
            ->collation('utf8mb4_bin')
                ->index()
               
                ->nullable();

            $table->string('side_group_code')
            ->collation('utf8mb4_bin')
                ->index()
                ->nullable();

            $table->string('erp_code')->collate('utf8mb4_bin')
                ->index()
               ;

            $table->longText('code') 
                ->nullable();

            $table->longText('image')
                ->nullable();

            $table->longText('unit_erp_code')->collate('utf8mb4_bin')
                ->nullable();

            $table->bigInteger('visit_count')
                ->default(0);

            $table->boolean('available')
                ->default(1);

            $table->bigInteger('limit_order')
                ->default(0);

            $table->boolean('is_vendor')
                ->default(0);

            $table->boolean('is_special')
                ->default(0);

            $table->string('other1') 
                ->nullable();

            $table->string('other2') 
                ->nullable();

            $table->string('other3') 
                ->nullable();

            $table->string('other4') 
                ->nullable();
            $table->string('other5') 
                ->nullable();

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
