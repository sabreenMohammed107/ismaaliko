<?php

namespace App\Http\Controllers;

use App\Models\Glass;
use App\Models\Products_category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use File;

class GlassController extends Controller
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
       public function __construct(Glass $object)
       {
           $this->middleware('auth');
           // $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','show']]);
           // $this->middleware('permission:users-create', ['only' => ['create','store']]);
           // $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
           // $this->middleware('permission:users-delete', ['only' => ['destroy']]);
           $this->object = $object;
           $this->viewName = 'admin.glasses.';
       $this->routeName = 'admin-glasses.';
       }/**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          $rows=Glass::orderBy("created_at", "Desc")->get();

          return view($this->viewName.'index', compact('rows'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          $categories=Products_category::all();
          return view($this->viewName . 'add',compact('categories'));
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          $input = $request->except(['_token','img']);

          if ($request->hasFile('img')) {
              $attach_image = $request->file('img');

              $input['image'] = $this->UplaodImage($attach_image);

          }


          Glass::create($input);
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
          $row = Glass::where('id', '=', $id)->first();
          $categories=Products_category::all();
          return view($this->viewName . 'edit', compact('row','categories'));
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
          $input = $request->except(['_token','img']);

          if ($request->hasFile('img')) {
              $attach_image = $request->file('img');

              $input['image'] = $this->UplaodImage($attach_image);

          }


          $this->object::findOrFail($id)->update($input);
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
          $row=Glass::where('id',$id)->first();
          // Delete File ..
          $file = $row->image;
          $file_name = public_path('uploads/glasses/' . $file);
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
          $uploadPath = public_path('uploads/glasses');

          // Move The image..
          $file->move($uploadPath, $imageName);

          return $imageName;
      }
}
