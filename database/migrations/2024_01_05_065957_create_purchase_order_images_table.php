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
        Schema::create('purchase_purchase_order_images', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->foreignId('purchase_order_id')
                ->nullable()
                ->on('purchase_order')
                ->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_purchase_order_images');
    }
};
