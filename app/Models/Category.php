<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'category','category_in_url'
    ];
    public $timestamps = false;
    public function ads(){
        return $this->hasMany('App\Models\Ads');
    }
}
