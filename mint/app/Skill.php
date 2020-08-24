<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public function userSkills()
    {
        return $this->belongsToMany('App\User', 'skills_intermediate');
    }

    //* Test for the skills retrieving Ajax call
    public function allSkills()
    {
        return $this->belongsToMany('App\User', 'skills_intermediate');
    }
}
