<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class comment extends model
{
	public $timestamps=false;
	public function thread(){
	return this->belongsTo('website_thread');
	}
}
