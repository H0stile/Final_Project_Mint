<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'firstname', 'lastname', 'type', 'linkedin', 'mentor_status', 'profile_image', 'pitch', 'availability'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Collaboration part
    public function mentors()
    {
        return $this->belongsToMany('App\User', 'collaboration', 'mentee_id', 'mentor_id')->withPivot('status_rqs');;
    }
    public function mentees()
    {
        return $this->belongsToMany('App\User', 'collaboration', 'mentor_id', 'mentee_id')->withPivot('status_rqs');
    }

    // Message part
    public function sendMessages()
    {
        return $this->hasMany('App\Message', 'writer_id');
    }
    public function receiveMessages()
    {
        return $this->hasMany('App\Message', 'target_id');
    }

    // Language Part
    public function languages()
    {
        return $this->belongsToMany('App\Language', 'languages_intermediate');
    }

    // Skill Part
    public function skills()
    {
        return $this->belongsToMany('App\Skill', 'skills_intermediate');
    }

    // Rating Part
    public function sendRatings()
    {
        return $this->hasMany('App\Rating', 'writer_id');
    }
    public function receiveRatings()
    {
        return $this->hasMany('App\Rating', 'target_id');
    }

    public function getFullName()
    {
        return "{$this->firstname} {$this->lastname}";
    }
}
