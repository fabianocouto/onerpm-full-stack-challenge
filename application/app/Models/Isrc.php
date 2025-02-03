<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Isrc extends Model
{
    /**
     * Table name in database
     *
     * @var string
     */
    public $table = 'isrc';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'code',
        'isrc_status_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function isrcStatus()
    {
        return $this->belongsTo(\App\Models\IsrcStatus::class);
    }
}
