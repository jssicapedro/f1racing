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
        if (!Schema::hasTable('results')) {
            Schema::create('results', function (Blueprint $table) {
                $table->id('idResults');
                $table->string('position', 45);
                $table->decimal('points', 5, 2);
                $table->integer('fastLapNumber')->nullable();
                $table->string('fastLapTime', 8)->nullable();
                $table->unsignedBigInteger('Driver_idDriver');
                $table->unsignedBigInteger('Prix_idPrix');
                $table->unsignedBigInteger('GrandPrix_idGrandPrix');

                $table->unique('idResults');
                $table->foreign('Driver_idDriver')->references('idDriver')->on('driver')->onDelete('cascade');
                $table->foreign('Prix_idPrix')->references('idPrix')->on('prix')->onDelete('cascade');
                $table->foreign('GrandPrix_idGrandPrix')->references('idGrandPrix')->on('grandprix')->onDelete('cascade');


                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
