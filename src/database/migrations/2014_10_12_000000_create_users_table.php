<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('username')->default(App\Helpers\Helper::randomString());
            $table->string('name_hago');
            $table->string('name');
            $table->string('password')->dafault(config('constant.password'));
            $table->integer('role')->default(3);
            $table->string('avatar')->default(asset('images/logo.jpg'));
            $table->integer('vip')->nullable();
            $table->integer('id_hago')->nullable();
            $table->dateTime('time_join')->default(now());
            $table->integer('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
