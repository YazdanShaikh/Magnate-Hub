<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('raising', function (Blueprint $table) {
            $table->id('raising_id');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('email');
            $table->integer('nationality')->nullable();
            $table->text('phone')->nullable();
            $table->integer('gender')->nullable();
            $table->text('password');
            $table->text('earning')->nullable();
            $table->text('net_worth')->nullable();
            $table->text('passport')->nullable();
            $table->text('identification')->nullable();
            $table->text('tin')->nullable();
            $table->string('profile',100)->nullable();
            $table->date('date');
            $table->time('time');
            $table->string('code',200)->nullable();
            $table->integer('status')->default(0);
            $table->integer('otp')->default(0);
            $table->integer('verified')->default(0);
            $table->integer('delete')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('raising');
    }
};
