<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glass extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'category_id',
        'overview',

    ];
    public function cat(){
        return $this->belongsTo('App\Models\Products_category', 'category_id','id');
    }
}
