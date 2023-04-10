<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\MainGroup;

class CreateMainGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_groups', function (Blueprint $table) {
            $table->id();

            $table->string('name')
                ->nullable();

            $table->string('erp_code')
                ->index()
                ->collate('utf8_bin');

            $table->timestamps();
        });

        MainGroup::create([
            'name'   => 'Category',
            'erp_code' => 'CategoryCode'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_groups');
    }
}
