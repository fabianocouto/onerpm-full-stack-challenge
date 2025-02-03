<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackArtists extends Model
{
    /**
     * Table name in database
     *
     * @var string
     */
    public $table = 'track_artists';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'track_id',
        'artist_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function track()
    {
        return $this->belongsTo(\App\Models\Track::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo(\App\Models\Artist::class);
    }
}
