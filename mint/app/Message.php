<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function writer()
    {
        return $this->belongsTo(User::class, 'writer_id');
    }

    public function target()
    {
        return $this->belongsTo(User::class, 'target_id');
    }
}
