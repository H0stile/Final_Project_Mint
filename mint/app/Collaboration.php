<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }
    public function mentee()
    {
        return $this->belongsTo(User::class, 'mentee_id');
    }

}


