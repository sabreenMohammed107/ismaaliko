<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'image',
        'title',
        'text',
        'order',
        'active',
    ];
    public function product(){
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
