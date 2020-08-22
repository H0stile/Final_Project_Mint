<?php
// mwe don't need this file for the moment
namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id', 'mentor_id');
    }
    public function mentee()
    {
        return $this->belongsTo(User::class, 'mentee_id');
    }

}


