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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id()->startingValue(10000);
            $table->string('customer')->nullable();
            $table->tinyInteger('invoice_type')->default(3);
            $table->json('items')->nullable();
            $table->unsignedFloat('total')->default(0);
            $table->unsignedInteger('period')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
