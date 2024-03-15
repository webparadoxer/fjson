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
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->json('data')->nullable();

//            $table->boolean('trustBuy')->default(false);
//            $table->unsignedInteger('trustTic')->nullable();
//            $table->unsignedInteger('trustX')->nullable();
//            $table->unsignedInteger('trustAlexa')->nullable();
//            $table->unsignedInteger('trustLinks')->nullable();
//            $table->unsignedInteger('trustSW')->nullable();
//            $table->unsignedInteger('trustLI')->nullable();
//
//            $table->unsignedInteger('checkTrust')->nullable();
//            $table->float('checkSpam')->nullable();
//            $table->string('checkHostQuality')->nullable();
//
//            $table->unsignedInteger('checkMjDin')->nullable();
//            $table->unsignedInteger('checkMjHin')->nullable();
//            $table->unsignedInteger('checkMjCF')->nullable();
//            $table->unsignedInteger('checkMjTF')->nullable();
//
//
//            $table->Integer('checkSemrushRuRating')->nullable();
//            $table->Integer('checkSemrushRuSeTraffic')->nullable();
//            $table->Integer('checkSemrushRuSeKWords')->nullable();
//            $table->string('checkSemrushQuality')->nullable();

            $table->json('expired')->nullable();

            $table->dateTime('delete_at')->nullable();
            $table->dateTime('check_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
