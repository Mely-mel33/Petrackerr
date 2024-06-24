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
        Schema::create('adoptions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('user_id');
            $table->string('full_name');
            $table->string('phone');
            $table->string('address');
            $table->enum('status', ['en_attente', 'acceptée', 'refusée'])->default('en_attente');
            $table->text('remarque')->nullable(); 
            $table->timestamps();
            $table->foreign('pet_id')->references('id')->on('petprofile')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoptions');
    }
};
