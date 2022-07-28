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
            $table->foreignId('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreignId('referer_user_id')->nullable();
            $table->foreign('referer_user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->date('birthdate')->nullable();
            $table->string('image');
            $table->bigInteger('referral_views')->default(0);
            $table->string('password');
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
