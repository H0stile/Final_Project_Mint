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
        return $this->belongsToMany('App\User', 'collaboration', 'mentee_id', 'mentor_id');
    }
    public function mentees()
    {
        return $this->belongsToMany('App\User', 'collaboration', 'mentor_id', 'mentee_id');
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
    public function language(){
        return $this->hasMany('App\language', 'id');
    }
}
