@extends('web.layout.web')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webssets/images/bg_2.png')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" dir="rtl">
            <div class="col-md-12 ftco-animate text-right">
                <h1 class="mb-2 bread">المقالات</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html"> الرئيسية <i class="ion-ios-arrow-back"></i></a></span> <span> المقالات </span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row" dir="rtl">
            <div class="col-lg-8 ">
                <div id="table_data">

                    @include('web.blogList')



                </div>


            </div>
            <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
                {{-- <div class="sidebar-box">
                    <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon icon-search"></span>
                            <input type="text" class="form-control" placeholder="البحث">
                        </div>
                    </form>
                </div> --}}
                <div class="sidebar-box ftco-animate">
                    <h2 class="clr-dark text-right pb-2">أخر المنتجات</h2>
                    @foreach ($products as $product)
                    <div class="blog-entry box-shadow">
                        <img src="{{ asset('uploads/products') }}/{{ $product->image }}" alt="{{ asset('uploads/products') }}/{{ $product->image }}" class="w-100 h-180" />
                        <div class="text p-3">
                            <h3 class="heading text-right"><a href="#" class="clr-dark">{{$product->name}}</a></h3>
                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="sidebar-box ftco-animate">
                    <h2 class="clr-dark text-right pb-2">أخر المقالات</h2>
                    @foreach ($latestPlogs as $latest)
                    <div class="block-21 mb-4 d-flex pl-2 box-shadow">
                        <a class="blog-img" href="{{ LaravelLocalization::localizeUrl('/single-blog/' . $latest->id . '/' . $latest->slug) }}" style="background-image: url('{{ asset('uploads/blogs') }}/{{ $latest->image }}');"></a>
                        <div class="text">
                            <h3 class="heading pt-3 pr-3 text-right"><a href="#" class="clr-dark">{{ $latest->title }}</a></h3>
                            <div class="meta text-right mr-3">
                                <p class="clr-gray">
                                    {{ Illuminate\Support\Str::words(strip_tags($latest->text ?? ''), 10) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
            <!-- END COL -->
        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page) {
                $.ajax({
                    url: "/blogs/fetch_data?page=" + page,
                    success: function(data) {
                        $('#table_data').html(data);
                    }
                });
            }

        });
    </script>
@endsection
