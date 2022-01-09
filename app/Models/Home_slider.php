<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_title',
        'image',
        'text',
        'order',
        'active',
    ];
}
