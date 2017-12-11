<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Discussion;
use App\User;
use Carbon\Carbon;


class Reply extends Model
{
    protected $fillable = [
    	'content',
    	'user_id',
    	'discussion_id',

    ];

    public function discussion(){
    	return $this->belongsTo('App\Discussion');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }


    public static function getCreatedAtAttribute($value)
    {
        Carbon::setLocale('ar');
        return Carbon::parse($value, 'Europe/Berlin')->diffForHumans();
    }
}

