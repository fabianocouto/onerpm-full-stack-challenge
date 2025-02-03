<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Isrc;
use App\Models\IsrcStatus;
use App\Services\Isrc\IsrcService;
use Illuminate\Support\Facades\Log;


class SyncIsrc extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-isrc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronizes the waiting ISRCs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Executing ' . $this->signature . ' command...');

        Isrc::select()->where('isrc_status_id', IsrcStatus::WAITING)->get()->each(function($isrc) {
            IsrcService::sync($isrc);
        });
    }
}
