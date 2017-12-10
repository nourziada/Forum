<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Channel;
use App\User;
use App\Reply;

class Discussion extends Model
{
    protected $fillable = [
    	'title',
    	'content',
    	'user_id',
    	'channel_id',
    ];


    public function channel(){
    	return $this->belongsTo('App\Channel');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }
}