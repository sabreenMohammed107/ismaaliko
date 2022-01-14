@extends('web.layout.web')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.png');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" dir="rtl">
            <div class="col-md-12 ftco-animate text-right">
                <h1 class="mb-2 bread">المطابخ</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html"> الرئيسية <i class="ion-ios-arrow-back"></i></a></span> <span> المطابخ </span></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row" dir="rtl">
            <div class="col-lg-8 ftco-animate">
                <div class="row">
                    <div class="col-lg-12 ftco-animate mb-4 bg-light p-3">
                        <div class="row">
                            <div class="col-lg-5">
                                {{-- <div class="img img-video d-flex align-items-center h-200" style="background-image: url({{ asset('uploads/products_categories') }}/{{ $category->image }});">
                                    <div class="video justify-content-center">
                                        <a href="{{ asset('uploads/products_categories') }}/{{ $category->vedio }}" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                                            <span class="ion-ios-play"></span>
                                        </a>
                                    </div>
                                </div> --}}
                                <a class="play-btn" href="{{ $category->vedio }}">
                                    <div class="img img-video d-flex align-items-center " style="height: 280px !important;">

                                        <iframe src="{{ $category->vedio }}" style=" width: 100%;
                                            height: 100%;
                                            position: absolute;
                                            object-fit: cover;
                                            z-index: 0;" frameborder="0"></iframe>
                                        <div>
                                            <i class="fa fa-play text-white fz-18"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-7">
                                <div class="p-3">
                                    <input type="hidden" name="" id="category" value="{{$category->id}}">
                                    <h5 class="mb-3 clr-dark text-right"><b>{{$category->name}}</b></h5>
                                    <p class="clr-gray text-right">
                                       {!! $category->overview!!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    {{-- paginate --}}
                    <div id="productList">
                   @include('web.productList')
            </div>
            {{-- end Paginate --}}
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
                            <h3 class="heading pt-3  pr-3 text-right"><a href="#" class="clr-dark">{{ $latest->title }}</a></h3>
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

<section class="bg-light p-3 mb-4">
    <div class="container">
        <div class="row justify-content-center" dir="rtl">
            <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
                <div class="row">
                    <div class="col-lg-5">
                        <img src="{{ asset('uploads/accessories') }}/{{ $accessory->image ?? '' }}" alt="{{ asset('uploads/accessories') }}/{{ $accessory->image ?? ''}}" class="img-fluid pro-img h-200 w-100">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-3">
                            <h5 class="mb-3 clr-dark text-right"><b>الاكسسورات</b></h5>
                            <p class="clr-gray text-right"> {!!$accessory->overview ?? '' !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="p-3">
    <div class="container">
        <div class="row justify-content-center" dir="rtl">
            <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-3">
                            <h5 class="mb-3 clr-dark text-right"><b>الزجاج المستخدم</b></h5>
                            <p class="clr-gray text-right">
                               {!!$glass->overview ?? ''!!}            </p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <img src="{{ asset('uploads/glasses') }}/{{ $glass->image ?? '' }}" alt="{{ asset('uploads/glasses') }}/{{ $glass->image ?? '' }}" class="img-fluid pro-img h-200 w-100">
                    </div>
                </div>
            </div>
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
                var category=$('#category').val();
                $.ajax({
                    url: "/productsData/fetch_data?page=" + page,
                    data:{
                        category:category,
                    },
                    success: function(data) {
                        $('#productList').html(data);
                    }
                });
            }

        });
    </script>
@endsection
