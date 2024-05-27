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
        Schema::create('_r_d_v', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('veterinaire_id');
            $table->date('date');
            $table->time('heure');
            $table->boolean('status')->default(false);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pet_id')->references('id')->on('petprofile');
            $table->foreign('veterinaire_id')->references('id')->on('veto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_r_d_v');
    }
};
