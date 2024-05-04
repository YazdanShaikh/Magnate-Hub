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
        Schema::create('comment', function (Blueprint $table) {
            $table->id('comment_id');
            $table->integer('blog_id');
            $table->integer('user_id');
            $table->text('name');
            $table->text('email');
            $table->text('phone');
            $table->text('message');
            $table->date('date');
            $table->time('time');
            $table->string('code',200)->nullable();
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
