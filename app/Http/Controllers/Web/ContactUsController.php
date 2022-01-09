<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang as Lang;
use App\Models\Message;

class ContactUsController extends Controller
{
    protected $viewName = 'web.';
    const stage_1 = 'message.failed';
    public function index()
    {
        $faq=Faq::where('active',1)->orderBy("order", "Desc")->get();

        return view($this->viewName . 'contact',compact('faq'));
    }
    public function sendMessage(Request $request){
        Message::create($request->except('_token'));

        \Session::flash('flash_success', Lang::get('links.controller_message'));
        return view($this->viewName.'confirm');

    }
}
