<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    /**
     * Table name in database
     *
     * @var string
     */
    public $table = 'track';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'isrc_id',
        'album_id',
        'title',
        'release_date',
        'duration_ms',
        'is_available_in_br_market',
        'spotify_track_id',
        'spotify_track_url'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_available_in_br_market' => 'boolean',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function isrc()
    {
        return $this->belongsTo(\App\Models\Isrc::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(\App\Models\Album::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function artists()
    {
        return $this->belongsToMany(\App\Models\Artist::class, 'track_artists');
    }
}
