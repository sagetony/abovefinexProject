<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBankNameToWithdrawsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdraws', function (Blueprint $table) {
            $table->string('bankType');
            $table->string('accountNumber');
            $table->string('bankAddress');
            $table->string('accountName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdraws', function (Blueprint $table) {
            $table->dropColumn('bankType');
            $table->dropColumn('accountNumber');
            $table->dropColumn('bankAddress');
            $table->dropColumn('accountName');
        });
    }
}
