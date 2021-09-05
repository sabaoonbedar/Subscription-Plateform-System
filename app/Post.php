<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
     'title', 'description','website_id'
    ];




public function website(){

return $this->belongsTo('App\Website');

}


}
