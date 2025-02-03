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
        Schema::create('isrc', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code')->index();
            $table->bigInteger('isrc_status_id')->unsigned();

            $table->foreign('isrc_status_id')->references('id')->on('isrc_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isrc');
    }
};
