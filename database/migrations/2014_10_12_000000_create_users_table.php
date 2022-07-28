<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name')->default('Yuldur');
            $table->string('phone')->unique();
            $table->uuid()->nullable();
            $table->string('avatar')->default('images/default.png');
            $table->integer('ball')->default(0);
            $table->date('birthday')->nullable();
            $table->boolean('gender')->default(1);
            $table->float('lat', 32, 16)->nullable();
            $table->float('lng', 32, 16)->nullable();
            $table->softDeletes();
            $table->string('fcm_token')->nullable();
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
};
