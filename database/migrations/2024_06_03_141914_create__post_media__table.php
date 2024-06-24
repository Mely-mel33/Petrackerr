<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostMediaTable extends Migration
{
    public function up()
    {
        Schema::create('post_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->string('file_type');
            $table->text('file');
            $table->string('position')->default('general');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_media');
    }
}
