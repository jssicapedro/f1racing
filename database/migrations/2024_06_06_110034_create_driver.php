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
        if (!Schema::hasTable('driver')) {
            Schema::create('driver', function (Blueprint $table) {
                $table->id('idDriver');
                $table->string('name', 45);
                $table->string('firstName', 25);
                $table->string('lastName', 25);
                $table->integer('number');
                $table->date('birth')->nullable();
                $table->string('country', 40);
                $table->string('placeBirth', 40)->nullable();
                $table->integer('podiums')->nullable();
                $table->integer('grandPrix')->nullable();
                $table->text('bibliography')->nullable();
                $table->string('imgDriver', 45)->nullable();
                $table->string('imgDriverProfile', 45)->nullable();
                $table->string('imgNumber', 45)->nullable();
                $table->string('imgCountry', 45)->nullable();
                $table->boolean('mainDriver')->nullable();
                $table->unsignedBigInteger('Team_idTeam')->nullable();

                $table->unique('idDriver');
                $table->foreign('Team_idTeam')->references('idTeam')->on('team')->onDelete('cascade')->onUpdate('cascade');

                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver');
    }
};
