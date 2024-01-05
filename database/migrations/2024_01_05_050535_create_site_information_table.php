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
        Schema::create('site_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('route_names_id')
                ->nullable()
                ->on('route_names')
                ->cascadeOnDelete();
            $table->foreignId('site_location_id')
                ->nullable()
                ->on('site_location')
                ->cascadeOnDelete();
            $table->foreignId('routes_id')
                ->nullable()
                ->on('routes')
                ->cascadeOnDelete();
            $table->foreignId('links_id')
                ->nullable()
                ->on('links')
                ->cascadeOnDelete();
            $table->foreignId('region_id')
                ->nullable()
                ->on('regions')
                ->cascadeOnDelete();
            $table->longtext('link_distance');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_information');
    }
};
