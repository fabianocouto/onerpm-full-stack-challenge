<?php

namespace App\Services\Isrc\Drivers\Clients;

use App\Services\Isrc\Contracts\ClientInterface;
use App\Models\Isrc;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

/**
 * SpotifyClient Class
 */
final class SpotifyClient implements ClientInterface
{
    /**
     * Spotify App Client ID
     * @see https://developer.spotify.com/documentation/web-api/concepts/apps
     * @var string
     */
    private $spotifyApiClientId;

    /**
     * Spotify App Client Secret
     * @see https://developer.spotify.com/documentation/web-api/concepts/apps
     * @var string
     */
    private $spotifyApiClientSecret;

    public function __construct()
    {
        $this->spotifyApiClientId = env('SPOTIFY_API_CLIENT_ID');
        $this->spotifyApiClientSecret = env('SPOTIFY_API_CLIENT_SECRET');
    }

    /**
     * Get Access Token
     *
     * @return string
     */
    private function getToken() : string
    {
        Log::info('IsrcService:Spotify: Getting access token');

        $client = new Client([
            'base_uri' => env('SPOTIFY_ACCOUNTS_API_URL', 'https://accounts.spotify.com'),
            'headers' => [
                'Authorization' => 'Basic ' . base64_encode($this->spotifyApiClientId . ':' . $this->spotifyApiClientSecret),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
        ]);

        $response = $client->post('/api/token',[
            'form_params' => [
                'grant_type' => 'client_credentials'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents());

        return $data->access_token;
    }

    /**
     * Get Http Client
     *
     * @return GuzzleHttp\Client
     */
    private function getClient()
    {
        Log::info('IsrcService:Spotify: Getting client');

        return new Client([
            'base_uri' => env('SPOTIFY_API_URL', 'https://api.spotify.com'),
            'headers' => [
                'Authorization' => 'Bearer ' . $this->getToken(),
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    /**
     * Get Search
     *
     * @param string $type
     * @param string $query
     * @return mixed
     */
    private function getSearch(string $type, string  $query)
    {
        try {

            Log::info('IsrcService:Spotify: Making search request', [
                'params' => [
                    'type' => $type,
                    'query' => $query,
                ],
            ]);

            $response = $this->getClient()->get('/v1/search', [
                'query' => [
                    'type' => $type,
                    'query' => $query
                ],
            ]);

            $data = json_decode($response->getBody()->getContents());

            return $data;

        } catch (\Throwable $th) {

            Log::error($th->getMessage());
            return null;
        }
    }

    /**
     * Search ISRC
     *
     * @param Isrc $isrc
     * @return mixed
     */
    public function searchIsrc(Isrc $isrc)
    {
        try {

            Log::info('IsrcService:Spotify: Making search by ISRC', [
                'isrc' => $isrc->code
            ]);

            return $this->getSearch('track', 'isrc:' . $isrc->code);

        } catch (\Throwable $th) {

            Log::error($th->getMessage());
            return null;
        }
    }
}