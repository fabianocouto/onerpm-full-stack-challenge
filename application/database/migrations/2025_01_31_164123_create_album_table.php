<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations
     */
    public function up(): void
    {
        Schema::create('album', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cover_image_url');
            $table->string('title')->index();
            $table->date('release_date');
            $table->boolean('is_available_in_br_market')->index();
            $table->string('spotify_album_id')->index();
            $table->string('spotify_album_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album');
    }
};
