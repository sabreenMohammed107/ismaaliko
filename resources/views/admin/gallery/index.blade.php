@extends('layout.web')

@section('title', 'معرض الصور')

@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">معرض الصور</h3>
      <a href="{{ route('admin-gallery.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a>

    </div><!-- /.box-header -->
    <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-resizable="true" data-cookie="true"
                data-show-export="true" data-locale="ar-SA"  style="direction: rtl" >
                                   <thead>
                                    <th data-field="state" data-checkbox="false"></th>
                                    <th data-field="id">#</th>
                                    <th>صورة</th>

                                        <th>الاسم  </th>
                                        <th>التصنيف  </th>
                                        <th> النص </th>

							<th>{{ __('الإجراء') }}</th>
						</thead>
						<tbody>
						@foreach($rows as $index => $row)
							<tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>
                                <td><img src="{{ asset('public/uploads/galleries') }}/{{ $row->image }}" width="100" height="100"> </td>

                                <td>{{$row->title}}</td>
                                <td>{{$row->cat->name ?? ''}}</td>

                                <td>{!! $row->text !!} </td>



                                      <td>
                                        <div class="btn-group">
                                            @can('edit')

                                            <a href="{{ route('admin-gallery.edit', $row->id) }}">
                                                <p class=" fa fa-cogs"></p>
                                            </a>

                                        @endcan
                                        @can('delete')
                                            <a href="#del{{ $row->id }}" data-toggle="modal"
                                                data-target="#del{{ $row->id }}">
                                                <p class="fa  fa-times"></p>
                                            </a>
                                        @endcan

                                        </div>
                                    </td>
							</tr>
                             <!-- Delete Modal -->
                             <div class="modal modal-danger" id="del{{ $row->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <form action="{{ route('admin-gallery.destroy', $row->id) }}"  method="POST" >
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
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection


