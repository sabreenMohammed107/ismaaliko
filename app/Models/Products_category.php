<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    'image',
    'vedio',
    'overview',
    'order',
    ];
    public function product(){
        return $this->hasMany('App\Models\Product', 'category_id','id');
    }
}
