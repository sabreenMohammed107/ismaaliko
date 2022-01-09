<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Company;
use App\Models\Gallery_category;
use App\Models\Home_slider;
use App\Models\Product;
use App\Models\Products_category;
use App\Models\Why_us;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $viewName='web.';
    public function index(){
        $homeSliders = Home_slider::where('active',1)->orderBy("order", "Desc")->get();
        $company=Company::first();
        $services=Products_category::take(3)->get();
        $why_us=Why_us::take(4)->inRandomOrder()->get();
        $categories=Category::all();
        $galleries=Gallery_category::all();
        $blogs=Blog::take(3)->where('active',1)->inRandomOrder()->get();
        return view($this->viewName.'index',compact('homeSliders','company','services','why_us','categories','galleries','blogs'));
    }


    public function gallery()
    {
        $categories = Category::all();
         $galleries = Gallery_category::all();
        return view('web.gallery', compact('categories','galleries'));
    }
}
