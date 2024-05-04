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
        Schema::create('chat', function (Blueprint $table) {
            $table->id('chat_id');
            $table->integer('user_id');
            $table->integer('raising_id');
            $table->integer('project_id');
            $table->text('message')->nullable();
            $table->date('date');
            $table->time('time');
            $table->string('code',200)->nullable();
            $table->integer('send')->default(0);
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat');
    }
};
