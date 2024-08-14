<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsOnTransactionBJBTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaction_bjb', function (Blueprint $table) {
            //
            $table->string('tid')->nullable();
            $table->string('mid')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaction_bjb', function (Blueprint $table) {
            //
            $table->dropColumn('tid');
            $table->dropColumn('mid');
            $table->dropColumn('agent_name');
            $table->dropColumn('status');
        });
    }
}
