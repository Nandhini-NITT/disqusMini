<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
        public $timestamps = false;
        protected $primaryKey='user_id';
        public function websites(){
        return $this->HasMany('App\user_website','user_id','user_id');
        }

}
