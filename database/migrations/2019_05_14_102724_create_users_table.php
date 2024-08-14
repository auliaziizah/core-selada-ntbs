<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->uuid('id')->primary();
            $table->bigInteger('role_id')->unsigned();
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->text('password');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_block')->default(false);
            $table->boolean('is_pristine')->default(true);
            $table->boolean('change_password')->default(false);
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
