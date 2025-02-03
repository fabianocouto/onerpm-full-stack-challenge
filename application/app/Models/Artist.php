<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    /**
     * Table name in database
     *
     * @var string
     */
    public $table = 'artist';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'spotify_artist_id',
        'spotify_artist_url',
    ];
}
