<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'text',
        'gallery_category_id',
        'type',
        'order',
        'active',

    ];
    public function cat(){
        return $this->belongsTo('App\Models\Category', 'gallery_category_id','id');
    }
}
