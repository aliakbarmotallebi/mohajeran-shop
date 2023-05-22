<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotteries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')
                ->nullable();
            $table->text('image_url')
                ->nullable();
            $table->dateTime('start_at')
                ->useCurrent();
            $table->dateTime('end_at')
                ->useCurrent();
            $table->enum('status', [
                'PUBLISH',
                'UN_PUBLISH'
            ])->default('PUBLISH');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('lottery_prizes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')
                ->nullable();
            $table->text('image_url')
                ->nullable();
            $table->integer('scores')
                ->default(0);
            $table->unsignedBigInteger('lottery_id');
            $table->foreign('lottery_id')
                ->references('id')
                ->on('lotteries')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->enum('status', [
                'PUBLISH',
                'UN_PUBLISH'
            ])->default('PUBLISH');
            $table->softDeletes();
            $table->timestamps();
        });


        Schema::create('lottery_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('lottery_name');
            $table->unsignedBigInteger('lottery_id');
            $table->foreign('lottery_id')
                ->references('id')
                ->on('lotteries')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('prize_name');
            $table->unsignedBigInteger('lottery_prize_id');
            $table->foreign('lottery_prize_id')
                ->references('id')
                ->on('lottery_prizes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('lottery_stocks');
        Schema::dropIfExists('lottery_prizes');
        Schema::dropIfExists('lotteries');
    }
}
