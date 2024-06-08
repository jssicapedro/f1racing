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
        Schema::create('car', function (Blueprint $table) {
            $table->id('idCar');
            $table->string('name', 45)->nullable();
            $table->string('chassis', 45);
            $table->string('powerUnit', 45);
            $table->string('maxSpeed', 45)->nullable();
            
            $table->unique('idCar');
            
            $table->timestamps(); // Se você desejar incluir os campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
