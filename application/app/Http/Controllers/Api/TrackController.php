<?php

namespace App\Http\Controllers\Api;

use App\Services\Isrc\IsrcService;
use App\Http\Controllers\Controller;
use App\Models\Track;
use App\Models\Isrc;
use App\Models\IsrcStatus;
use Illuminate\Http\Request;
use App\Http\Resources\TrackResource;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks = Track::select()
            ->with([
                'isrc',
                'isrc.isrcStatus',
                'album',
                'album.artists',
                'artists',
            ])
            ->orderBy('title')
            ->get();

        return TrackResource::collection($tracks);
    }
}
