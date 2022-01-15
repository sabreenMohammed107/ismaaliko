@extends('layout.web')
@section('title', 'إدارة المهام')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary px-5">
        <div class="box-header">
          <h3 class="box-title"> بيانات  المنتج</h3>
        </div>







<div class="box">
    <div class="box-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card card-info card-tabs">
                                        <div class="box-header p-0 pt-1 bg-white">
                                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                <li class="nav-item active">
                                                    <a class="nav-link text-dark active" id="custom-tabs-one-1-tab" data-toggle="pill"
                                                        href="#custom-tabs-one-1" role="tab"
                                                        aria-controls="custom-tabs-one-1" aria-selected="true">بيانات
                                                        اساسية</a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" id="custom-tabs-one-2-tab" data-toggle="pill"
                                                        href="#custom-tabs-one-2" role="tab"
                                                        aria-controls="custom-tabs-one-2" aria-selected="false">الصور </a>
                                                </li>

                                                <li class="nav-item">
                                                    <a class="nav-link text-dark" id="custom-tabs-one-3-tab" data-toggle="pill"
                                                        href="#custom-tabs-one-3" role="tab"
                                                        aria-controls="custom-tabs-one-3" aria-selected="false">متعلقات</a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <div class="tab-pane fade in active" id="custom-tabs-one-1"
                                                    role="tabpanel" aria-labelledby="custom-tabs-one-1-tab">
                                                    <div class="card card-primary">
                                                        <!-- form start -->
                                                        <form role="form" action="{{ route('admin-product.update',$product->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="box-body">
                                                                <div class="col-sm-12">

                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for=""> الاسم </label>
                                                                            <input type="text"
                                                                                value="{{$product->name}}"
                                                                                name="name" class="form-control" id="">
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="">الفديو</label>
                                                                            <input type="text"
                                                                                value="{{$product->vedio}}"
                                                                                name="vedio" class="form-control"
                                                                                id="">
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="">التصنيف</label>
                                                                            <select name="category_id" class="form-control" id="">

                                                                                @foreach($categories as $type)
                                                                                <option value="{{$type->id}}" {{ $product->category_id == $type->id ? 'selected' : '' }}>{{$type->name}}</option>
                                                                                @endforeach
                                                                              </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="">الترتيب</label>
                                                                            <input type="number"
                                                                                value="{{$product->order}}"
                                                                                name="order" class="form-control"
                                                                                id="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">اضافة  صورة</label>

                                                                            <input type="file" name="img" class="custom-file-input"
                                                                            id="inputGroupFile02" />  <label class="custom-file-label"
                                                                            for="inputGroupFile02">{{ $product->image ?? '' }}</label>


                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">صورة  الكاتلوج </label>

                                                                            <input type="file" name="image_catalog" class="custom-file-input"
                                                                            id="inputGroupFile02" />  <label class="custom-file-label"
                                                                            for="inputGroupFile02">{{ $product->image_catalog ?? '' }}</label>


                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="">الوصف </label>
                                                                            <textarea class="form-control summernote" name="overview">{{$product->overview}}</textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                              <input type="checkbox" @if($product->active==1) checked @endif id="newTitle" name="active"  value="1"> {{ __('نشط') }}
                                                                            </label>
                                                                          </div>

                                                                    </div>


                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                                <div class="box-footer">
                                                                    <button type="submit"
                                                                        class="btn btn-primary">حفظ</button>
                                                                    <a href="{{ route('admin-product.index') }}"
                                                                        class="btn btn-danger">إلغاء</a>

                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            <div class="tab-pane fade" id="custom-tabs-one-2" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-2-tab">
                                                @include('admin.product.images')
                                                <hr />


                                            </div>

                                            <div class="tab-pane fade" id="custom-tabs-one-3" role="tabpanel"
                                                aria-labelledby="custom-tabs-one-3-tab">
                                                @include('admin.product.components')
                                                <hr />


                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->



        @endsection

        @section('scripts')

        @endsection
