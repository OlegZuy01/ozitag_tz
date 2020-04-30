<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';
    public $timestamps = false;
    protected $fillable = [
       'city','city_in_url'
    ];
    public function ads(){
        return $this->hasMany('App\Models\Ads');
    }
}
