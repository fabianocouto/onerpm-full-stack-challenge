<?php

namespace App\Services\Isrc\Drivers;

use App\Services\Isrc\Contracts\DriverInterface;
use App\Services\Isrc\Drivers\Clients\SpotifyClient;
use App\Models\Album;
use App\Models\AlbumArtists;
use App\Models\Artist;
use App\Models\Isrc;
use App\Models\IsrcStatus;
use App\Models\Track;
use App\Models\TrackArtists;
use Illuminate\Support\Facades\Log;

/**
 * SpotifyDriver Class
 */
final class SpotifyDriver implements DriverInterface
{
    /**
     * @param Isrc $isrc
     * @return void
     */
    public static function syncIsrc(Isrc $isrc) : void
    {
        $spotifyClient = new SpotifyClient();

        $response = $spotifyClient->searchIsrc($isrc);

        if (!$response || !$response->tracks->total) {

            Log::info('IsrcService:Spotify: ISRC not found', [
                'isrc' => $isrc->code,
            ]);

            $isrc->update(['isrc_status_id' => IsrcStatus::NOT_FOUND]);

            return;
        }

        foreach($response->tracks->items as $item) {

            $album = Album::updateOrCreate (
                [
                    'spotify_album_id' => $item->album->id
                ],
                [
                    'cover_image_url' => $item->album->images[0]->url,
                    'title' => $item->album->name,
                    'release_date' => $item->album->release_date,
                    'is_available_in_br_market' => collect($item->album->available_markets)->has('BR'),
                    'spotify_album_url' => $item->album->external_urls->spotify
                ]
            );

            Log::debug('IsrcService:Spotify: Synchronized album', [
                'album' => $album->getAttributes(),
            ]);

            foreach ($item->album->artists as $albumArtist) {

                $artist = Artist::updateOrCreate (
                    [
                        'spotify_artist_id' => $albumArtist->id
                    ],
                    [
                        'name' => $albumArtist->name,
                        'spotify_artist_url' => $albumArtist->external_urls->spotify
                    ]
                );

                Log::debug('IsrcService:Spotify: Synchronized album artist', [
                    'artist' => $artist->getAttributes(),
                ]);

                AlbumArtists::updateOrCreate(
                    [
                        'album_id' => $album->id,
                        'artist_id' => $artist->id,
                    ]
                );
            }

            $track = Track::updateOrCreate (
                [
                    'spotify_track_id' => $item->id
                ],
                [
                    'isrc_id' => $isrc->id,
                    'album_id' => $album->id,
                    'title' => $item->name,
                    'release_date' => isset($item->release_date) ? $item->release_date : $album->release_date,
                    'duration_ms' => $item->duration_ms,
                    'is_available_in_br_market' => collect($item->available_markets)->has('BR'),
                    'spotify_track_url' => $item->external_urls->spotify
                ]
            );

            Log::debug('IsrcService:Spotify: Synchronized track', [
                'track' => $track->getAttributes(),
            ]);

            foreach ($item->artists as $trackArtist) {

                $artist = Artist::updateOrCreate (
                    [
                        'spotify_artist_id' => $trackArtist->id
                    ],
                    [
                        'name' => $trackArtist->name,
                        'spotify_artist_url' => $trackArtist->external_urls->spotify
                    ]
                );

                Log::debug('IsrcService:Spotify: Synchronized track artist', [
                    'artist' => $artist->getAttributes(),
                ]);

                TrackArtists::updateOrCreate(
                    [
                        'track_id' => $track->id,
                        'artist_id' => $artist->id,
                    ]
                );
            }
        }

        Log::info('IsrcService:Spotify: ISRC successfully synchronized', [
            'isrc' => $isrc->code,
        ]);

        $isrc->update(['isrc_status_id' => IsrcStatus::WAS_FOUND]);
    }
}