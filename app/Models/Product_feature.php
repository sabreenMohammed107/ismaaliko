<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_feature extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'title',
        'value',
        'order',
        'active',
    ];
    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
