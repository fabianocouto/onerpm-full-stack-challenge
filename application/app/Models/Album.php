<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /**
     * Table name in database
     *
     * @var string
     */
    public $table = 'album';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'cover_image_url',
        'title',
        'release_date',
        'is_available_in_br_market',
        'spotify_album_id',
        'spotify_album_url',
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
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function artists()
    {
        return $this->belongsToMany(\App\Models\Artist::class, 'album_artists');
    }
}
