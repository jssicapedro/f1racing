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
        if (!Schema::hasTable('countries')) {
            Schema::create('countries', function (Blueprint $table) {
                $table->id();
                $table->char('iso_3166_2', 2)->unique();
                $table->char('iso_3166_3', 3)->unique();
                $table->string('name');
                $table->string('official_name')->nullable();
                $table->string('common_name')->nullable();
                $table->string('flag')->nullable(); // Adiciona a coluna flag
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
