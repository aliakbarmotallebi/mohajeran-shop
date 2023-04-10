<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('mobile', 11)
                ->unique();

            $table->string('password');

            $table->string('name')
                ->nullable();

            $table->string('tel')
                ->nullable();

            $table->string('zip_code', 10)
                ->nullable();
                
            $table->text('address')
                ->nullable();

            $table->string('erp_code')->collate('utf8mb4_bin')
                ->nullable();

            $table->enum('role', [
                'Customer',
                'Admin'
            ])
            ->default('Customer');

            $table->string('verification_code')
                ->nullable();

            $table->longText('addresses')
                ->nullable();
                
            $table->boolean('is_black_list')
                ->default(false);

            $table->rememberToken();
            $table->timestamps();
        });


        // User::withoutEvents(function () use () {
        $user = new User;
        $user->mobile   = '09306193414';
        $user->password = 'shop123@';
        $user->erp_code = 'UserCode';
        $user->role     = 'Admin';
        $user->saveQuietly();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
