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
        Schema::create('prix', function (Blueprint $table) {
            $table->id('idPrix');
            $table->string('name', 45);
            $table->string('grandPrixName', 100)->nullable();
            $table->string('comunName', 45)->nullable();
            $table->string('country', 45);
            $table->year('firstGrandPrix');
            $table->float('distance')->nullable();
            $table->float('length');
            $table->integer('laps')->nullable();
            $table->text('info')->nullable();
            $table->string('imgCircuts', 45)->nullable();
            $table->string('imgBanner', 45)->nullable();
            $table->string('imgAbout', 45)->nullable();
            $table->string('imgCountry', 45)->nullable();

            $table->unique('idPrix');
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
