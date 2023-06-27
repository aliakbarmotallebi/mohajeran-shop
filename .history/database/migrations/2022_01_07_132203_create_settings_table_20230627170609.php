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
        settings(['APP_VERSION'  => NULL ]);
        settings(['END_OF_LIFE_TOKEN'  => NULL ]);
        settings(['ERPCODE_COURIER_COST'  => NULL ]);
        settings(['INSTANT_MESSAGINGS'  => NULL ]);
        settings(['INSTANT_MESSAGINGS_DEFAULT'  => NULL ]);
        settings(['INSTANT_MESSAGINGS_END'  => NULL ]);
        settings(['INSTANT_MESSAGINGS_START'  => NULL ]);
        settings(['LAST_TIME_FETCH_CUSTOMERS'  => NULL ]);
        settings(['LAST_TIME_FETCH_PRODCUTS'  => NULL ]);
        settings(['MIN_ORDER_AMOUNT'  => NULL ]);
        settings(['MIN_ORDER_PRICE'  => NULL ]);
        settings(['PRICE_COURIER_COST'  => NULL ]);
        settings(['SLIDER_COLOR'  => NULL ]);
        settings(['SLIDER_IMAGE'  => NULL ]);
        settings(['SLIDER_TITLE'  => NULL ]);
        settings(['TOKEN_SERVICE'  => NULL ]);
        settings(['TAXI_FARE'  => NULL ]);
        settings(['TRANSPORTATION_COST_1'  => NULL ]);
        settings(['TRANSPORTATION_COST_2'  => NULL ]);
        settings(['TRANSPORTATION_COST_3'  => NULL ]);
        settings(['TRANSPORTATION_COST_4'  => NULL ]);
        settings(['TRANSPORTATION_COST_5'  => NULL ]);
        settings(['TRANSPORTATION_COST_6'  => NULL ]);
        settings(['TRANSPORTATION_COST_7'  => NULL ]);
        settings(['TRANSPORTATION_COST_8'  => NULL ]);
        settings(['TRANSPORTATION_COST_9'  => NULL ]);
    }
}
