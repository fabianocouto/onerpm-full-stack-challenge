<?php

namespace Database\Seeders;

use App\Models\Isrc;
use App\Models\IsrcStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IsrcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $isrcs = [
            'US7VG1846811',
            'US7QQ1846811',
            'BRC310600002',
            'BR1SP1200071',
            'BR1SP1200070',
            'BR1SP1500002',
            'BXKZM1900338',
            'BXKZM1900345',
            'QZNJX2081700',
            'QZNJX2078148',
        ];

        foreach ($isrcs as $code) {
            Isrc::create([
                'code' => $code,
                'isrc_status_id' => IsrcStatus::WAITING,
            ]);
        }
    }
}
