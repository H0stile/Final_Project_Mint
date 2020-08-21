<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function userSkills(){
        return $this->belongsToMany('App\User', 'skills_intermediate');
    }
}
