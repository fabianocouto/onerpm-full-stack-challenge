<?php

namespace Database\Seeders;

use App\Models\IsrcStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IsrcStatusSeeder extends Seeder
{
    /**
     * Run the database seeds
     */
    public function run(): void
    {
        IsrcStatus::create([
            'id' => 1,
            'title' => 'Waiting',
        ]);

        IsrcStatus::create([
            'id' => 2,
            'title' => 'Was Found',
        ]);

        IsrcStatus::create([
            'id' => 3,
            'title' => 'Not Found',
        ]);
    }
}
