<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Channel;
use App\User;
use App\Reply;
use Carbon\Carbon;

class Discussion extends Model
{
    protected $fillable = [
    	'title',
    	'content',
    	'user_id',
    	'channel_id',
        'slug',
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


    public static function getCreatedAtAttribute($value)
    {
        Carbon::setLocale('ar');
        return Carbon::parse($value, 'Asia/Gaza')->diffForHumans();
    }
}
