<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class website_thread extends Model
{
	public $timestamps=false;
	public function comments(){
	return $this->hasMany('App\Comments','website_id','website_id');
	}
	public function website()
    {
    return $this->HasOne('App\user_website','website_id','website_id');
    }
}