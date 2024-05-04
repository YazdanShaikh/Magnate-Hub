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
        Schema::create('project', function (Blueprint $table) {
            $table->id('project_id');
            $table->integer('user_id')->default(0);
            $table->integer('raising_id')->default(0);
            $table->integer('account_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('location_id')->default(0);
            $table->string('id',200);
            $table->string('card',200)->nullable();
            $table->longText('images')->nullable();
            $table->text('name');
            $table->bigInteger('price')->default(0);
            $table->text('trading')->nullable();
            $table->text('earning_type')->nullable();
            $table->text('stock_level')->nullable();
            $table->text('summary')->nullable();
            $table->text('location_information')->nullable();
            $table->text('skills')->nullable();
            $table->text('potential')->nullable();
            $table->text('hours')->nullable();
            $table->text('staff')->nullable();
            $table->text('lease')->nullable();
            $table->text('business_established')->nullable();
            $table->text('training')->nullable();
            $table->text('awards')->nullable();
            $table->text('reason_for_sale')->nullable();
            $table->text('seeking_investment')->nullable();
            $table->text('reported_sales')->nullable();
            $table->text('run_rate_sales')->nullable();
            $table->text('EBITDA_margin')->nullable();
            $table->text('industry')->nullable();
            $table->text('assets_or_collateral')->nullable();
            $table->text('interested_to_connect_with_advisors')->nullable();
            $table->text('business_overview')->nullable();
            $table->text('products_and_dervices_overview')->nullable();
            $table->text('assets_overview')->nullable();
            $table->text('facilities_overview')->nullable();
            $table->text('capitalization_overview')->nullable();
            $table->date('date');
            $table->time('time');
            $table->text('url');
            $table->string('code',200)->nullable();
            $table->integer('status')->default(0);
            $table->integer('premium')->default(0);
            $table->integer('block')->default(0);
            $table->integer('sold')->default(0);
            $table->integer('rating')->default(0);
            $table->integer('views')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project');
    }
};
