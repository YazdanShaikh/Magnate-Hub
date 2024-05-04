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
        Schema::create('traffic', function (Blueprint $table) {
            $table->id('traffic_id');
            $table->text('ip')->nullable();
            $table->text('country')->nullable();
            $table->text('city')->nullable();
            $table->string('day',100);
            $table->string('month',100);
            $table->string('year',100);
            $table->date('date');
            $table->string('code',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic');
    }
};
