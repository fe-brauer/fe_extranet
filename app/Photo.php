<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [];

    protected $with = ['album'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
