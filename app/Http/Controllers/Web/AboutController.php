<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Company;
use App\Models\Feedback;
use App\Models\Team;
use App\Models\Why_us;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected $viewName='web.';
    public function index(){
        $company=Company::first();
        $feedback=Feedback::where('active',1)->get();
        $why_us=Why_us::take(4)->inRandomOrder()->get();
        $team=Team::all();
        $clients=Client::all();
        return view($this->viewName.'about',compact('clients','company','team','why_us','feedback'));
    }
}
