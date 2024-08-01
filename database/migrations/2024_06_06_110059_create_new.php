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
        if (!Schema::hasTable('new')) {
            Schema::create('new', function (Blueprint $table) {
                $table->id('idNew');
                $table->string('title', 45);
                $table->text('description');
                $table->string('img', 45)->nullable();
                $table->string('banner', 45)->nullable();

                $table->unique('idNew');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
