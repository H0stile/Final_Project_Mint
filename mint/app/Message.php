<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function writer()
    {
        return $this->belongsTo('App\User', 'writer_id');
    }
    public function receiver()
    {
        return $this->belongsTo('App\User', 'target_id');
    }
}
