<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();

            $table->string('name')
                ->nullable();

            $table->string('few')
                ->nullable()
                ->default(0);

            $table->string('erp_code')->collate('utf8mb4_bin')
                ->nullable();

            $table->string('arithmetic_few')
                ->nullable()
                ->default(1);

            $table->string('min_few')
                ->nullable()
                ->default(1);
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
        Schema::dropIfExists('units');
    }
}
