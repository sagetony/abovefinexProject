<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignalbuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signalbuys', function (Blueprint $table) {
            $table->id();
            $table->string('userID');
            $table->string('username');
            $table->string('email');
            $table->string('phone');
            $table->string('referral');
            $table->string('signalpurchaseID');
            $table->string('amount');
            $table->string('signalplan');
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
        Schema::dropIfExists('signalbuys');
    }
}
