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
        Schema::create('blog', function (Blueprint $table) {
            $table->id('blog_id');
            $table->text('name');
            $table->text('description');
            $table->longtext('blog')->nullable();
            $table->integer('account_id');
            $table->date('date');
            $table->time('time');
            $table->text('writter_name');
            $table->string('id',200);
            $table->string('card',100)->nullable();
            $table->string('writter_image',100)->nullable();
            $table->string('code',200)->nullable();
            $table->integer('status')->default(0);
            $table->integer('views')->default(0);
            $table->text('url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog');
    }
};
