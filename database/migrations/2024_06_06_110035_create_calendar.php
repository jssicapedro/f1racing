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
        if (!Schema::hasTable('calendar')) {
            Schema::create('calendar', function (Blueprint $table) {
                $table->id('idCalendar');
                $table->unsignedBigInteger('Prix_idPrix');
                $table->unsignedBigInteger('GrandPrix_idGrandPrix');
                $table->dateTime('t1');
                $table->dateTime('t2')->nullable();
                $table->dateTime('t3')->nullable();
                $table->dateTime('sprintQualify')->nullable();
                $table->dateTime('sprint')->nullable();
                $table->dateTime('qualify');
                $table->dateTime('race');

                $table->unique('idCalendar');
                $table->foreign('Prix_idPrix')->references('idPrix')->on('prix')->onDelete('cascade');
                $table->foreign('GrandPrix_idGrandPrix')->references('idGrandPrix')->on('grandprix')->onDelete('cascade');

                $table->timestamps(); // Se você desejar incluir os campos created_at e updated_at
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calendar');
    }
};
