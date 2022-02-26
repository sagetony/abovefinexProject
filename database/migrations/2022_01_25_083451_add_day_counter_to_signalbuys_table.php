<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDayCounterToSignalbuysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('signalbuys', function (Blueprint $table) {
            $table->string('dayCounter');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signalbuys', function (Blueprint $table) {
                $table->dropColumn('dayCounter');
                $table->dropColumn('status');
        });
    }
}
