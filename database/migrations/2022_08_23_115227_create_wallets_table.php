<?php

use App\Models\Wallet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->string('amount')
                ->default(0);
            $table->string('balance')
                ->default(0);
            $table->string('summery')
                ->nullable();
            $table->enum('type', [
                    'TYPE_DEPOSIT',
                    'TYPE_WITHDRAW'
                ]);
            $table->enum('status', [
                    'STATUS_COMPLETED',
                    'STATUS_REJECTED'
                ])->default('STATUS_REJECTED');
            $table->text('message_form_admin')
                ->nullable();
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
        Schema::dropIfExists('wallets');
    }
};
