<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {

			$table->string('name')
				->unique()
				->index();
				
            $table->longText('value')
				->nullable();
				
            $table->primary('name');
				
        });

        $this->init();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }

    private function init(): void
    {
        settings(['MIN_ORDER_AMOUNT'  => NULL ]);
        settings(['TOKEN_SERVICE'  => NULL ]);
        settings(['END_OF_LIFE_TOKEN'  => NULL ]);
    }
}
