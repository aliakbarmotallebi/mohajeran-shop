<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            
            $table->longText('image');

            $table->string('side_group_name')
                ->nullable();

            $table->string('side_group_code')
                ->collation('utf8mb4_bin')
                ->index()
                ->nullable();


            $table->enum('status', [
                'SECTION1',
                'SECTION2',
                'SECTION3',
                'SECTION4',
                'SECTION5',
                'SECTION6',
                'SECTION7',
                'SECTION8',
                'SECTION9',
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
        Schema::dropIfExists('banners');
    }
}
