<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery_category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class GalleryCategoryController extends Controller
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
      public function __construct(Category $object)
      {
          $this->middleware('auth');
          // $this->middleware('permission:users-list|users-create|users-edit|users-delete', ['only' => ['index','show']]);
          // $this->middleware('permission:users-create', ['only' => ['create','store']]);
          // $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
          // $this->middleware('permission:users-delete', ['only' => ['destroy']]);
          $this->object = $object;
          $this->viewName = 'admin.gallery-category.';
      $this->routeName = 'admin-gallery-category.';
      }
      /** gallery-category
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows=Category::orderBy("created_at", "Desc")->get();

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
        Category::create($request->except('_token'));
        return redirect()->route($this->routeName.'index')->with('flash_success','تم الحفظ بنجاح');

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
        $row = Category::where('id', '=', $id)->first();

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
        $this->object::findOrFail($id)->update($request->except('_token'));



        return redirect()->route($this->routeName.'index')->with('flash_success','تم الحفظ بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->object::findOrFail($id)->delete();

        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger', 'هذا القيمه مربوطه بجدول اخر ...!');

        }
        return redirect()->route($this->routeName.'index')->with('flash_success', 'تم الحذف بنجاح');


    }
}
