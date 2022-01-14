@extends('web.layout.web')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.png');">
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
            <div class="col-lg-8 ftco-animate">
                <div class="row">
                    <div class="col-lg-12 ftco-animate">
                        <div class="text-right">
                            <p>
                                <img src="{{ asset('uploads/blogs') }}/{{ $row->image }}" alt="{{ asset('uploads/blogs') }}/{{ $row->image }}" class="img-fluid h-400 w-100">
                            </p>
                            <h2 class="mb-3 clr-dark"><b>{{ $row->title }}</b></h2>
                            <p class="clr-gray">{!! $row->text !!}</p> </div>
                        <div class="row" dir="rtl">
                            <div class="col-lg-4">
                                <div class="tag-widget post-tag-container mb-5 mt-5">
                                    <h6 class="clr-dark text-right pb-1">مشاركه على التواصل الاجتماعى</h6>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="tag-widget post-tag-container mb-5 mt-5">
                                    <div class="tagcloud">
                                        <a href="#" class="tag-cloud-link bg-face"><span class="icon-facebook pr-4 fz"></span> 9.5K</a>
                                        <a href="#" class="tag-cloud-link bg-tweet"><span class="icon-twitter pr-4"></span> 9.5K</a>
                                        <a href="#" class="tag-cloud-link bg-insta"><span class="icon-instagram pr-4"></span> 9.5K</a>
                                        <a href="#" class="tag-cloud-link bg-ytube"><span class="icon-youtube pr-4"></span> 9.5K</a>
                                        <a href="#" class="tag-cloud-link bg-linked"><span class="icon-linkedin pr-4"></span> 9.5K</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="blog-pagination d-flex justify-content-center align-items-center w-100">
                        <ul class="pagination">
                            <li class="page-item p-no"><a href="@if(App\Models\Blog::where('id',$next)->first()) {{ LaravelLocalization::localizeUrl('/single-blog/' . $next. '/' . App\Models\Blog::where('id',$next)->first()->slug) }}  @endif" class="page-link"><i class="ion-ios-arrow-forward"></i></a></li>
                            <li class="page-item p-no"><a href="@if(App\Models\Blog::where('id',$previous)->first()) {{ LaravelLocalization::localizeUrl('/single-blog/' . $previous. '/' . App\Models\Blog::where('id',$previous)->first()->slug) }}  @endif" class="page-link"><i class="ion-ios-arrow-back"></i></a></li>
                        </ul>
                    </nav>
                </div>
                <div class="row">
                    <h3 class="text-right clr-dark pb-3">مقالات اخري</h3>
                    <div class="row" dir="rtl">
                        @foreach ($others as $other)
                        <div class="col-md-6 col-lg-4 ftco-animate">
                            <div class="blog-entry box-shadow">
                                <img src="{{ asset('uploads/blogs') }}/{{ $other->image }}" alt="{{ asset('uploads/blogs') }}/{{ $other->image }}" class="w-100" />
                                <div class="text p-4">
                                    <h3 class="heading text-right"><a href="#" class="clr-dark">{{ $other->title }}</a></h3>
                                    <p class="text-right">{{Illuminate\Support\Str::limit(strip_tags($other->text ?? ''), $limit = 100, $end = '')}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach



                    </div>
                </div>
            </div>
            <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">
                <div class="sidebar-box">
                    {{-- <form action="#" class="search-form">
                        <div class="form-group">
                            <span class="icon icon-search"></span>
                            <input type="text" class="form-control" placeholder="البحث">
                        </div>
                    </form> --}}
                </div>
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
