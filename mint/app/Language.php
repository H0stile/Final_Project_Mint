<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function userLanguage(){
        return $this->belongsToMany('App\User', 'languages_intermediate');
    }
}