<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetNotesTable extends Migration
{
    public function up(): void
    {
        Schema::create('pet_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('petprofile')->onDelete('cascade'); // Modifier la référence ici
            $table->string('title');
            $table->date('date');
            $table->time('time')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pet_notes');
    }
}
