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
        Schema::create('purchase_order', function (Blueprint $table) {
            $table->id();
            $table->string('serial_no');
            $table->foreignId('suppliers_id')
                ->nullable()
                ->on('suppliers')
                ->cascadeOnDelete();
            $table->string('shipping_method');
            $table->date('delivery_date');
            $table->string('payment_terms');
            $table->date('due_date');
            $table->foreignId('site_information_id')
                ->nullable()
                ->on('site_information')
                ->cascadeOnDelete();
            $table->foreignId('management_user_id')
                ->nullable()
                ->on('management_user')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('purchase_order');
    }
};
