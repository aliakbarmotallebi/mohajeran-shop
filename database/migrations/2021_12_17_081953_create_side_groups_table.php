<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\SideGroup;

class CreateSideGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('side_groups', function (Blueprint $table) {
            $table->id();

            $table->string('name')
            ->nullable();

            $table->string('erp_code')
            ->collate('utf8_bin');

            $table->string('main_group_name')
                ->nullable();

            $table->string('main_erp_code')
                ->index()
                ->collate('utf8_bin');

            $table->timestamps();
        });

        SideGroup::create([
            'name'   => 'Category',
            'erp_code' => 'SubcategoryCode',
            'main_group_name'   => 'Category',
            'main_erp_code' => 'CategoryCode'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('side_groups');
    }
}
