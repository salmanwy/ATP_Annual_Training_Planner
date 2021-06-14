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
            $table->string('name');
            $table->string('type')->nullable();
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('sainik_id')->unique()->nullable();
            $table->string('rank')->nullable();
            $table->string('coy_name')->nullable();
            $table->string('trade')->nullable();
            $table->string('joining_date')->nullable();
            $table->boolean('btt')->nullable();
            $table->boolean('att')->nullable();
            $table->boolean('bmr')->nullable();
            $table->boolean('course')->nullable();
            $table->boolean('gp_trg')->nullable();
            $table->boolean('pre_leave')->nullable();
            $table->boolean('admin')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
