@extends('layout.web')

@section('title', ' عن الشركة')

@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">عن الشركة</h3>
      {{-- <a href="{{ route('admin-company.create') }}" class="btn btn-info btn-lg pull-right"> اضافة </a> --}}

    </div><!-- /.box-header -->
    <div class="box-body">

            <div class="box-body">
                <table id="table" data-toggle="table" data-pagination="true" data-search="true"  data-resizable="true" data-cookie="true"
                data-show-export="true" data-locale="ar-SA"  style="direction: rtl" >
                                   <thead>
                                    <th data-field="state" data-checkbox="false"></th>
                                    <th data-field="id">#</th>
                                        <th>عن  الشركة </th>



                                        <th>رؤيتنا</th>


                                        <th>مهمتنا </th>


							<th>{{ __('الإجراء') }}</th>
						</thead>
						<tbody>
						@foreach($rows as $index => $row)
							<tr>
                                <td></td>
                                <td>{{ $index + 1 }}</td>

                                <td>
                                    {{Illuminate\Support\Str::limit(strip_tags($row->overview ?? ''), $limit = 100, $end = '...')}}
                                </td>




                                <td>
                                     {{Illuminate\Support\Str::limit(strip_tags($row->vision ?? ''), $limit = 100, $end = '...')}}
                                </td>




                                <td>
                                    {{Illuminate\Support\Str::limit(strip_tags($row->mission ?? ''), $limit = 100, $end = '...')}}
                                </th>

                                      <td>
                                        <div class="btn-group">
                                            @can('edit')

                                            <a href="{{ route('admin-company.edit', $row->id) }}">
                                                <p class=" fa fa-cogs"></p>
                                            </a>

                                        @endcan


                                        </div>
                                    </td>
							</tr>

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


