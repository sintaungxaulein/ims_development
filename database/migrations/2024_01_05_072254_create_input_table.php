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
        Schema::create('input', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warehouses_id')
                ->nullable()
                ->on('warehouses')
                ->cascadeOnDelete();
            $table->foreignId('items_id')
                ->nullable()
                ->on('items')
                ->cascadeOnDelete();
            $table->foreignId('invoices_id')
                ->nullable()
                ->on('invoices')
                ->cascadeOnDelete();
            $table->foreignId('imported_by')
                ->nullable()
                ->on('users')
                ->cascadeOnDelete();
            $table->string('received_quantity');
            $table->string('damage_quantity');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input');
    }
};
