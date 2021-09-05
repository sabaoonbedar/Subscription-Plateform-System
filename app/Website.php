<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{

    protected $fillable = ['name'];





//one to many relationships

public function posts(){


return $this->hasMany('App\Post');

}



//one to many relationships

public function subscribers(){


    return $this->hasMany('App\Subscribers');

    }



}
