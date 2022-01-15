<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_feature;
use App\Models\Product_image;
use App\Models\Products_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use File;
class ProductController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;
    public function __construct(Product $object)
    {

        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.product.';
        $this->routeName = 'admin-product.';
        $this->message = 'تم حفظ البيانات';
        $this->errormessage = 'راجع البيانات هناك خطأ';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Product::all();
        return view($this->viewName . 'index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Products_category::all();
        $attachments = [];
        $features = [];
        return view($this->viewName . 'add', compact('categories', 'attachments', 'features'));
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
            'name' => 'required',

            'category_id' => 'required',

            'img' => 'required',

        ], [

            'name.required' => 'حقل الاسم مطلوب',
            'category_id.required' => 'حقل التصنيف مطلوب',

            'img.required' => 'حقل الصورة مطلوب',

        ]);
        DB::beginTransaction();
        try
        {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $values = array_except($request->all(), ['_token', 'img', 'active']);


            if ($request->input('active') == 1) {
                $values['active'] = 1;
            } else {
                $values['active'] = 0;
            }

            if ($request->hasFile('image_catalog')) {
                $attach_image = $request->file('image_catalog');

                $values['image_catalog'] = $this->UplaodImage($attach_image);

            }
            if ($request->hasFile('img')) {
                $attach_image = $request->file('img');

                $values['image'] = $this->UplaodImage($attach_image);

            }
            $product = $this->object::create($values);

            // dd($request->get('regulation_end_date'));
            // $image = Image::create($data);
            //   $product->images()->save($image);
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect()->route($this->routeName . 'edit', $product->id)->with('flash_success', 'تم الحفظ بنجاح');
        } catch (\Throwable $e) {
            DB::rollback();

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
        $product = Product::where('id', '=', $id)->first();
        $attachments = Product_image::where('product_id', '=', $id)->get();
        $categories = Products_category::all();

        //features
        $features = Product_feature::where('product_id', '=', $id)->get();

        return view($this->viewName . 'edit', compact('product', 'attachments', 'categories', 'features', ));
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
        DB::beginTransaction();
        try
        {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            $values = array_except($request->all(), ['_token', 'img', 'active']);

            if ($request->input('active') == 1) {
                $values['active'] = 1;
            } else {
                $values['active'] = 0;
            }
            if ($request->hasFile('image_catalog')) {
                $attach_image = $request->file('image_catalog');

                $values['image_catalog'] = $this->UplaodImage($attach_image);

            }
            if ($request->hasFile('img')) {
                $attach_image = $request->file('img');

                $values['image'] = $this->UplaodImage($attach_image);

            }
            $this->object::findOrFail($id)->update($values);

            // dd($request->get('regulation_end_date'));
            // $image = Image::create($data);
            //   $product->images()->save($image);
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            return redirect()->route($this->routeName . 'edit', $id)->with('flash_success', 'تم الحفظ بنجاح');
        } catch (\Throwable $e) {
            DB::rollback();

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
        $row=Product::where('id',$id)->first();
        // Delete File ..
        $file = $row->image;
        $file_name = public_path('uploads/products/' . $file);
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
        $uploadPath = public_path('uploads/products');

        // Move The image..
        $file->move($uploadPath, $imageName);

        return $imageName;
    }
}
