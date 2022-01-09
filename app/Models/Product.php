<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'category_id',
        'overview',
        'image_catalog',
        'vedio',
        'order',
        'active',
    ];
    public function cat(){
        return $this->belongsTo('App\Models\Products_category', 'category_id');
    }

    public function feature(){
        return $this->hasMany('App\Models\Product_feature', 'product_id','id');
    }

    public function images(){
        return $this->hasMany('App\Models\Product_image', 'product_id','id');
    }
}
