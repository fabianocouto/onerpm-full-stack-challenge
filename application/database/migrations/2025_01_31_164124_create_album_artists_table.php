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
        Schema::create('album_artists', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('album_id')->unsigned();
            $table->bigInteger('artist_id')->unsigned();

            $table->foreign('album_id')->references('id')->on('album');
            $table->foreign('artist_id')->references('id')->on('artist');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_artists');
    }
};
