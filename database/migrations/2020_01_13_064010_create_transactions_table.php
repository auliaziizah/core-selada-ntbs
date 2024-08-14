<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_id')->unsigned();

            $table->string('code');
            $table->string('merchant_id');
            $table->string('merchant_no'); // no customer mau itu hp, listrik dll
            $table->bigInteger('price')->default(0);
            $table->bigInteger('vendor_price')->default(0);
            $table->text('note')->nullable();
            $table->smallInteger('status')->default(0);
            $table->smallInteger('payment_status')->default(0);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
