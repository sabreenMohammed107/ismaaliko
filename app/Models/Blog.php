<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [ 'blog_date',
    'title',
    'text',
    'image',
    'order',
    'active',];



    public function getSlugAttribute(): string
    {

            return urlencode($this->title);


    }




    public function getUrlAttribute(): string
    {
        // return action('App\Http\Controllers\Web\BlogsController', [$this->id, $this->slug]);
        return $this->slug;
    }
}
