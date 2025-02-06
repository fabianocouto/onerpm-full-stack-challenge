<?php

namespace Tests\Feature\App\Services;

use App\Services\Isrc\IsrcService;
use App\Services\Isrc\Drivers\SpotifyDriver;
use App\Services\Isrc\Drivers\Clients\SpotifyClient;
use App\Models\Isrc;
use Tests\TestCase;
use File;

class IsrcServiceTest extends TestCase
{
    public function test_that_sync_with_success(): void
    {
        $spotifyClientMock = $this->createMock(SpotifyClient::class);
        $spotifyClientMock->method('searchIsrc')
            ->willReturn(json_decode(File::get(base_path(
                'tests/Feature/App/Services/Mock/SpotifySearchResponse.json'
            ))));

        $spotifyDriver = new SpotifyDriver($spotifyClientMock);
        $isrcService = new IsrcService($spotifyDriver);

        $isrc = Isrc::find(1);
        $isrcSync = $isrcService->sync($isrc);

        $this->assertTrue($isrcSync);
    }

    public function test_that_sync_if_spotify_client_returns_anot_found_response(): void
    {
        $spotifyClientMock = $this->createMock(SpotifyClient::class);
        $spotifyClientMock->method('searchIsrc')
        ->willReturn(json_decode(File::get(base_path(
            'tests/Feature/App/Services/Mock/SpotifySearchNotFoundResponse.json'
        ))));

        $spotifyDriver = new SpotifyDriver($spotifyClientMock);
        $isrcService = new IsrcService($spotifyDriver);

        $isrc = Isrc::find(1);
        $isrcSync = $isrcService->sync($isrc);

        $this->assertTrue($isrcSync);
    }

    public function test_that_not_sync_if_spotify_client_throws_error(): void
    {
        $spotifyClientMock = $this->createMock(SpotifyClient::class);
        $spotifyClientMock->method('searchIsrc')
            ->willThrowException(new \Exception('Spotify Client Error'));

        $spotifyDriver = new SpotifyDriver($spotifyClientMock);
        $isrcService = new IsrcService($spotifyDriver);

        $isrc = Isrc::find(1);
        $isrcSync = $isrcService->sync($isrc);

        $this->assertFalse($isrcSync);
    }
}
