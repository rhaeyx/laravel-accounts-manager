<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Netflix extends Model
{
    protected $table = 'netflixs';

    public function user() {
        return $this->belongsTo('User');
    }
}
