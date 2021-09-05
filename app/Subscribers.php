<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribers extends Model
{


    protected $fillable = [
        'email','website_id'
       ];



//one to many relationships
   public function website(){

   return $this->belongsTo('App\Website');

   }




}
