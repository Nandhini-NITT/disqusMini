<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class website_thread extends Model
{
	public $timestamps=false;
	public function comments(){
	return this->hasMany('App\Comments');
	}
}