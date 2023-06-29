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

            $table->boolean('is_vendor')
                ->default(false);

            $table->boolean('is_disabled')
                ->default(false);

            $table->longText('image')
                ->nullable();

            $table->string('time')
                ->nullable();

            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')
                ->nullable()
                ->constrained()
                ->references('id')
                ->on('users')
                ->onDelete('cascade');


            $table->string('erp_code')->collate('utf8mb4_bin')
                ->index();

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
