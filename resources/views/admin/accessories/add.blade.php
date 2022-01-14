@extends('layout.web')

@section('title', ' اكسسوار')

@section('content')

<div class="row">
    <!-- left column -->
    <div class="col-md-10">
            <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">اضافة</h3>
        </div>






                  <form action="{{route('admin-accessories.store')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                  <div class="box-body">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">التصنيف</label>
                            <select name="category_id" class="form-control" id="">

                                @foreach($categories as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>



                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">اضافة  صورة</label>

                                    <input type="file" name="img" class="custom-file-input"
                                    id="inputGroupFile02" />


                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label  >{{ __('  النص ') }}</label>
                                    <textarea class="form-control summernote" name="overview">{{old('overview')}}</textarea>


                                </div>
                                </div>

                <div class="col-xs-6 col-sm-6 col-md-6 text-center">
                    <button type="submit" class="btn btn-primary">حفظ</button>
                    <a href="{{route('admin-accessories.index')}}" class="btn btn-danger">إلغاء</a>
                </div>
                </div>

                  </form>
              </div>
    </div>

@endsection
