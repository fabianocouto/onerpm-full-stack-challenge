<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumArtists extends Model
{
    /**
     * Table name in database
     *
     * @var string
     */
    public $table = 'album_artists';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'album_id',
        'artist_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo(\App\Models\Album::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function artist()
    {
        return $this->belongsTo(\App\Models\Artist::class);
    }
}
