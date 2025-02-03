<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;
use Database\Seeders\IsrcSeeder;

return new class extends Migration
{
    /**
     * Run the migrations
     */
    public function up(): void
    {
        Artisan::call('db:seed', [
            '--class' => IsrcSeeder::class,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
