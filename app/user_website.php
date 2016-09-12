<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_website extends Model
{
    public $timestamps=false;
    protected $primaryKey='website_id';
    public function threads()
    {
    	return $this->HasMany('App\website_thread','website_id','website_id');
    }
   
}
