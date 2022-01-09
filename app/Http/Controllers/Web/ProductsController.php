<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\accessory;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Glass;
use App\Models\Product;
use App\Models\Products_category;
use App\Models\Why_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang as Lang;
use App\Models\Message;

class ProductsController extends Controller
{
    protected $viewName='web.';

    public function index($id){

        $productsList=Product::where('category_id',$id)->orderBy("created_at", "asc")->paginate(3);
        $category=Products_category::where('id',$id)->first();
        $products=Product::take(3)->orderBy("created_at", "desc")->get();
        $latestPlogs=Blog::take(3)->orderBy("created_at", "desc")->get();
        $accessory=accessory::where('category_id',$id)->first();
        $glass=Glass::where('category_id',$id)->first();
        return view($this->viewName.'products',compact('category','productsList','latestPlogs','products','accessory','glass'));
    }

    function fetch_data(Request $request)
    {


     if($request->ajax())
     {
        $productsList=Product::where('category_id',$request->category)->orderBy("created_at", "asc")->paginate(3);
\Log::info($request->category);
      return view($this->viewName.'productList', compact('productsList'))->render();
     }
    }


    public function singleProduct($id){
        $row=Product::where('id', $id)->first();
        $products=Product::take(3)->orderBy("created_at", "desc")->get();
        $latestPlogs=Blog::take(3)->orderBy("created_at", "desc")->get();
        $why_us=Why_us::take(4)->inRandomOrder()->get();
        $faq=Faq::where('active',1)->orderBy("order", "Desc")->get();
        return view($this->viewName.'single-product',compact('row','latestPlogs','products','why_us','faq'));

    }

    public function sendMessage(Request $request){
        Message::create($request->except('_token'));

        \Session::flash('flash_success', Lang::get('links.controller_message'));
        return view($this->viewName.'confirm');

    }
}
