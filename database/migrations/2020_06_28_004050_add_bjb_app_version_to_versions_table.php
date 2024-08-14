<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBjbAppVersionToVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('versions', function (Blueprint $table) {
            //
            $table->string('android_link')->nullable();
            $table->string('android_bjb_version')->nullable();
            $table->string('android_bjb_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('versions', function (Blueprint $table) {
            //
            $table->dropColumn('android_link');
            $table->dropColumn('android_bjb_version');
            $table->dropColumn('android_bjb_link');
        });
    }
}
