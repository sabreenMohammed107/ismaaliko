<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',

    ];
    public function gallery(){
        return $this->hasMany('App\Models\Gallery_category', 'gallery_category_id','id');
    }
}
