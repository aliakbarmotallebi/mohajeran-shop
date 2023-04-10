<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Slider;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();

            $table->longText('image');

            $table->enum('status', [
                'UN_PUBLISH',
                'PUBLISH'
            ])->default('PUBLISH');

            $table->timestamps();
        });

        Slider::insert(
        [
            [
                'image' => 'https://dummyimage.com/500x300'
            ],
            [
                'image' => 'https://dummyimage.com/500x300'
            ],
            [
                'image' => 'https://dummyimage.com/500x300'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
