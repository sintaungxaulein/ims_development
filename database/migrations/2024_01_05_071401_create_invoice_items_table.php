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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoices_id')
                ->nullable()
                ->on('invoices')
                ->cascadeOnDelete();
            $table->foreignId('items_id')
                ->nullable()
                ->on('items')
                ->cascadeOnDelete();
            $table->integer('price_per_item');
            $table->integer('quantity');
            $table->integer('total_amount');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
