<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Languages extends Model
{
    public function userLanguage(){
        return $this->belongsToMany('App\User', 'id');
    }
}
