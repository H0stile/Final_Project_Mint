<?php
// mwe don't need this file for the moment
namespace App;

use Illuminate\Database\Eloquent\Model;

class Collaboration extends Model
{
    public $table = 'collaboration';
    public $timestamps = false;
    protected $fillable = ['mentor_id','mentee_id','request_msg','status_rqs'];

    public function mentor()
    {
        return $this->belongsTo('App\User');
        // return $this->belongsTo('App\User', 'mentor_id', 'mentor_id');
    }
    public function mentee()
    {
        return $this->belongsTo('App\User');
        // return $this->belongsTo('App\User', 'mentee_id');
    }

}


