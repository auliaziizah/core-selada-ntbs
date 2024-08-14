<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biller_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('biller_id')->unsigned();
            
            $table->string('code')->nullable();
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('request_type')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('biller_id')->references('id')->on('billers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biller_details');
    }
}
