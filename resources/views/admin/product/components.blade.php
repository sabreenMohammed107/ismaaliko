

    <div class="box-body">

<h3 class="card-title float-sm-left"><a href="" class="btn btn-success" data-toggle="modal"
        data-target="#add-tab-component">إضافة</a></h3>
<table id="example1" class="table table-bordered table-striped">
    <thead class="bg-info">
        <tr>
            <th>#</th>
            <th>الاسم </th>

            <th>النص </th>


            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($features as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row->title ?? '' }} </td>

                <td>{{ $row->value ?? '' }} </td>


                <td>
                    <div class="btn-group">
                        <a href="#edit-component{{ $row->id }}" data-toggle="modal" data-target="#edit-component{{$row->id}}"><p class=" fa fa-cogs"></p></button>
                            @can('delete')
                            <a href="#del77{{ $row->id }}" data-toggle="modal"
                            data-target="#del77{{ $row->id }}"><p class="fa  fa-times"></p></button>
                                             @endcan

                    </div>
                </td>
            </tr>
            <!-- Delete Modal -->
            <div class="modal modal-danger" id="del77{{ $row->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('features.destroy', $row->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header ">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title" id="exampleModalLabel">تأكيد الحذف</h5>
                                </button>
                            </div>
                            <div class="modal-body bg-light">
                                <p><i class="fa fa-fire "></i></p>
                                <p>حذف جميع البيانات ؟</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left"
                                    data-dismiss="modal">الغاء</button>
                                <button type="submit" class="btn btn-outline">حفظ </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Edit Tab-7 Modal -->
            <div class="modal fade dir-rtl" id="edit-component{{ $row->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                            <h5 class="modal-title" id="exampleModalLabel">تعديل البيانات </h5>
                            <button type="button" class="close m-0 p-0 text-white" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <h3><i class="fa fa-edit text-success"></i></h3>
                            <form action="{{ route('features.update', $row->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="product_id" value="@isset($product)
                        {{ $product->id }}
                    @endisset">
                                <div class="card-body">
                                    <div class="row">


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>الاسم </label>
                                                        <input type="text"
                                                            name="title"
                                                            class="form-control"  value="{{ $row->title }}">

                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>النص </label>
                                                        <input type="text"
                                                            name="value"
                                                            class="form-control"   value="{{ $row->value }}">

                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">الترتيب</label>
                                                    <input type="number"
                                                        value="{{$row->order}}"
                                                        name="order" class="form-control"
                                                        id="">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="checkbox">
                                                    <label>
                                                      <input type="checkbox" id="newTitle" @if($row->active==1) checked @endif name="active"  value="1"> {{ __('نشط') }}
                                                    </label>
                                                  </div>

                                            </div>





                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                    <button type="submit" class="btn btn-success">تأكيد</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        @endforeach
    </tbody>
</table>

    </div>

<!-- Add Tab-7 Modal -->
<div class="modal fade dir-rtl" id="add-tab-component" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalLabel">إضافة </h5>
                <button type="button" class="close m-0 p-0 text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h3><i class="fa fa-edit text-success"></i></h3>
                <form action="{{ route('features.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="@isset($product)
                            {{ $product->id }}
                        @endisset">
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>الاسم </label>
                                        <input type="text"
                                            name="title"
                                            class="form-control" value="{{old('title') }}">


                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>النص </label>
                                        <input type="text"
                                            name="text"
                                            class="form-control"  value="{{ old('text') }}">

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">الترتيب</label>
                                    <input type="number"
                                        value="{{old('order')}}"
                                        name="order" class="form-control"
                                        id="">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <label>
                                      <input type="checkbox" id="newTitle" name="active"  value="1"> {{ __('نشط') }}
                                    </label>
                                  </div>

                            </div>

                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                        <button type="submit" class="btn btn-success">تأكيد</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
