<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IsrcStatus extends Model
{
    const WAITING = 1;
    const WAS_FOUND = 2;
    const NOT_FOUND = 3;

    /**
     * Table name in database
     *
     * @var string
     */
    public $table = 'isrc_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
    ];
}
