<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public function writer()
    {
        return $this->belongsTo('App\User', 'writer_id');
    }

    public function target()
    {
        return $this->belongsTo('App\User', 'target_id');
    }
}
