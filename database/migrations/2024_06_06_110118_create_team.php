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
        Schema::create('team', function (Blueprint $table) {
            $table->id('idTeam');
            $table->string('name', 25);
            $table->string('fullName', 45);
            $table->string('base', 45);
            $table->string('country', 45);
            $table->string('teamChief', 100);
            $table->string('technicalChief', 100);
            $table->year('firstTeamEntry');
            $table->integer('polePositions')->nullable();
            $table->integer('worldChampionShips')->nullable();
            $table->string('color', 45);
            $table->string('imgLogo', 45)->nullable();
            $table->string('imgTeam', 45)->nullable();
            $table->string('imgFullName', 45)->nullable();
            $table->string('imgCountry', 45)->nullable();
            $table->unsignedBigInteger('Car_idCar')->nullable();

            $table->unique('idTeam');
            $table->foreign('Car_idCar')->references('idCar')->on('car')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
