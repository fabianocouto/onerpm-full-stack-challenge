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
        Schema::create('track', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('isrc_id')->unsigned();
            $table->bigInteger('album_id')->unsigned();
            $table->string('title')->index();
            $table->date('release_date');
            $table->string('duration_ms');
            $table->boolean('is_available_in_br_market')->index();
            $table->string('spotify_track_id');
            $table->string('spotify_track_url');

            $table->foreign('isrc_id')->references('id')->on('isrc');
            $table->foreign('album_id')->references('id')->on('album');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('track');
    }
};
