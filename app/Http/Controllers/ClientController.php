<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use File;
class ClientController extends Controller
{
       // This is for General Class Variables.
       protected $object;
       protected $viewName;
       protected $routeName ;

       /**
        * UserController Constructor.
        *
        * @return \Illuminate\Http\Response
        */
       public function __construct(Client $object)
       {
           $this->middleware('auth');
           // $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','show']]);
           // $this->middleware('permission:users-create', ['only' => ['create','store']]);
           // $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
           // $this->middleware('permission:users-delete', ['only' => ['destroy']]);
           $this->object = $object;
           $this->viewName = 'admin.client.';
       $this->routeName = 'admin-client.';
       }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=Client::orderBy("created_at", "Desc")->get();


        return view($this->viewName.'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->viewName . 'add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except(['_token','img','active']);
        if ($request->hasFile('img')) {
            $attach_image = $request->file('img');

            $input['logo'] = $this->UplaodImage($attach_image);

        }
        if($request->has('active')){
            $input['active'] = 1;
        }else{
            $input['active'] = 0;

        }

    Client::create($input);
    return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Client::where('id', '=', $id)->first();

        return view($this->viewName . 'edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except(['_token','img','active']);
        if ($request->hasFile('img')) {
            $attach_image = $request->file('img');

            $input['logo'] = $this->UplaodImage($attach_image);

        }
        if($request->has('active')){
            $input['active'] = 1;
        }else{
            $input['active'] = 0;

        }


    Client::findOrFail($id)->update($input);
        return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row=Client::where('id',$id)->first();
        // Delete File ..
        $file = $row->image;
        $file_name = public_path('uploads/clients/' . $file);
        try {
            File::delete($file_name);
            $row->delete();
            return redirect()->back()->with('flash_success', 'تم الحذف بنجاح !');

        } catch (QueryException $q) {
            return redirect()->back()->withInput()->with('flash_danger', $q->getMessage());

            // return redirect()->back()->with('flash_danger', 'هذه القضية مربوطه بجدول اخر ..لا يمكن المسح');
        }
    }

     /* uplaud image
     */
    public function UplaodImage($file_request)
    {
        //  This is Image Info..
        $file = $file_request;
        $name = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $size = $file->getSize();
        $path = $file->getRealPath();
        $mime = $file->getMimeType();

        // Rename The Image ..
        $imageName = $name;
        $uploadPath = public_path('uploads/clients');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
