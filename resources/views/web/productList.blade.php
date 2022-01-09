<div class="row">
    @foreach ($productsList as $product)
    <div class="col-lg-12  mb-4">
        <div class="row box-shadow">
            <div class="col-lg-5 pro-right">
                <img src="{{ asset('uploads/products') }}/{{ $product->image }}" alt="{{ asset('uploads/products') }}/{{ $product->image }}" class="img-fluid pro-img h-100 w-100">
            </div>
            <div class="col-lg-7 pro-left">
                <table class="table product-tbl">
                    <thead>
                        <tr>
                            <th scope="col">الموقع</th>
                            <th scope="col">المواصفات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->feature as $feature)
                        <tr>
                            <td><b>{{$feature->title}}</b></td>
                            <td>{{$feature->value}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-lg-12 p-3">
                <h5 class="mb-3 clr-dark text-right"><b>{{ $product->name }}</b></h5>
                <p class="clr-gray text-right">
{!!$product->overview !!}                </p>
                <div class="text-left">
                    <p class="ml-auto mb-0">
                        <a href="{{ LaravelLocalization::localizeUrl('/single-product/' . $product->id) }}" class="mr-2">  قراءة المزيد  <i class="ion-ios-arrow-back"></i><i class="ion-ios-arrow-back"></i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>
<div class="row mt-4">
    <nav class="blog-pagination d-flex justify-content-center align-items-center w-100">
        <ul class="pagination">
            @for ($i = 1; $i <= $productsList->lastPage(); $i++)
            <!-- a Tag for another page -->
            <li class="page-item p-no  {{ $productsList->currentPage() == $i ? ' active' : '' }}"> <a
                    href="{{ $productsList->url($i) }}" class="page-link">{{ $i }}</a></li>
        @endfor

        </ul>
    </nav>
</div>
