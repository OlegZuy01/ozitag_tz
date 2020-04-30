<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    public $timestamps = false;
    protected $fillable =[
        'title','img_url','text','category_id','subcategory_id','city_id','price'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
