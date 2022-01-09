<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    protected $viewName='web.';

    public function index(){

        $blogs=Blog::orderBy("created_at", "asc")->paginate(4);
        $products=Product::take(3)->orderBy("created_at", "desc")->get();
        $latestPlogs=Blog::take(3)->orderBy("created_at", "desc")->get();
        return view($this->viewName.'blogs',compact('blogs','latestPlogs','products'));
    }

    public function singleBlog($id){
        $row=Blog::where('id', $id)->first();
        $products=Product::take(3)->orderBy("created_at", "desc")->get();
        $latestPlogs=Blog::take(3)->orderBy("created_at", "desc")->get();
         // get previous user id

    $previous = Blog::where('id', '<', $id)->max('id');

    // get next user id
    $next = Blog::where('id', '>', $id)->min('id');
        return view($this->viewName.'single-blog',compact('row','latestPlogs','products','previous','next'))->withCanonical($row->url);

        // return view('web.single-blog',compact('blog','tags','blogs'))->withCanonical($blog->url);
    }
    function fetch_data(Request $request)
            {


             if($request->ajax())
             {
                $blogs=Blog::orderBy("created_at", "Desc")->paginate(4);

              return view($this->viewName.'blogList', compact('blogs'))->render();
             }
            }
}
