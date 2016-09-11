<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_website extends Model
{
    public $timestamps=false;
    public function threads()
    {
    	return this->hasMany('App\website_thread');
    }
    
}
