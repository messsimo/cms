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
        Schema::create('sales_accountings', function (Blueprint $table) {
            $table->increments("id");
            $table->string("month_year");
            $table->integer("total_sales");
            $table->integer("success_sales");
            $table->integer("unsuccess_sales");
            $table->integer("expenses");
            $table->integer("profit");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_accountings');
    }
};
