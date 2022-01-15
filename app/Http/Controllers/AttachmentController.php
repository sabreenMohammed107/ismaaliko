<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_image;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class AttachmentController extends Controller
{
    // This is for General Class Variables.
    protected $object;
    protected $viewName;
    protected $routeName;

    /**
     * UserController Constructor.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Product $object)
    {
        $this->middleware('auth');
        // $this->middleware('permission:products-list|create|edit|delete', ['only' => ['index', 'show']]);
        // $this->middleware('permission:create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete', ['only' => ['destroy']]);
        $this->object = $object;
        $this->viewName = 'admin.product.';
        $this->routeName = 'product.';
    } /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',

        ], [

            'product_id.required' => 'يجب حفظ البيانات الاساسية اولا',

        ]);
        DB::beginTransaction();
        try
        {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $input = $request->except(['_token','img','active']);

            if ($request->hasFile('img')) {
                $attach_image = $request->file('img');

                $input['image'] = $this->UplaodImage($attach_image);
            }

        if($request->has('active')){
            $input['active'] = 1;
        }else{
            $input['active'] = 0;

        }


            Product_image::create($input);
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->back()->with('flash_success','تم الحفظ بنجاح');
        } catch (\Throwable $e) {
            // throw $th;
            DB::rollback();
            // return redirect()->back()->withInput()->with('flash_danger', 'حدث خطأ الرجاء معاودة المحاولة في وقت لاحق');

            return redirect()->back()->withInput()->with('flash_danger', $e->getMessage());
        }
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
        //
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
        $this->validate($request, [
            'product_id' => 'required',

        ], [

            'product_id.required' => 'يجب حفظ البيانات الاساسية اولا',

        ]);
        DB::beginTransaction();
        try
        {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $input = $request->except(['_token','img','active']);

            if ($request->hasFile('img')) {
                $attach_image = $request->file('img');

                $input['image'] = $this->UplaodImage($attach_image);
            }

        if($request->has('active')){
            $input['active'] = 1;
        }else{
            $input['active'] = 0;

        }

            Product_image::findOrFail($id)->update($input);
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->back()->with('flash_success','تم الحفظ بنجاح');
        } catch (\Throwable $e) {
            // throw $th;
            DB::rollback();
            // return redirect()->back()->withInput()->with('flash_danger', 'حدث خطأ الرجاء معاودة المحاولة في وقت لاحق');

            return redirect()->back()->withInput()->with('flash_danger', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Product_image::findOrFail($id);

        $file = $row->image;

        $file_name = public_path('uploads/products/' . $file);
        try {
            $row->delete();
            File::delete($file_name);

        } catch (QueryException $q) {

            return redirect()->back()->with('flash_danger','هذا المنتج مرتبط بجدول اخر');

        }
            return redirect()->route($this->routeName.'index')->with('flash_success', ' تم الحذف بنجاح!');
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
        $uploadPath = public_path('uploads/products');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
