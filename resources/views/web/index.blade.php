@extends('web.layout.web')

@section('content')
    <!-- Slider -->
    <section class="slider-section hero-wrap">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol> <!-- End of Indicators -->
            <!-- Carousel Content -->
            <div class="carousel-inner" role="listbox">
                @foreach ($homeSliders as $index => $slide)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}"
                        style="background-image: url({{ asset('uploads/home_sliders') }}/{{ $slide->image }});">
                        <div class="overlay"></div>
                        <div class="container" dir="rtl">
                            <div class="row  pt-5 slider-text align-items-center justify-content-start"
                                data-scrollax-parent="true" dir="rtl">
                                <div class="col-md-6 ftco-animate">
                                    <h1 class="mb-4 text-right text-white">
                                        {!! $slide->title !!}
                                        <br />
                                        {!! $slide->sub_title !!}
                                    </h1>
                                    <p class="text-right mb-4 text-white"> {!! $slide->text !!}</p>
                                    <p class="text-right">
                                        <a href="#" class="btn btn-primary mt-3 ml-3">المزيد</a>
                                        <a href="#" class="btn btn-primary btn-outline-primary mt-3">اتصل بنا</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End of Carousel Item -->
                @endforeach

            </div>
            <!-- End of Carousel Content -->
            <!-- Previous & Next -->
            <a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        </div> <!-- End of Carousel -->
    </section>
    <!-- End of Slider -->

    <section class="ftco-section bg-light2">
        <div class="container">
            <div class="row d-flex" dir="rtl">
                <div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
                    <div class="img"> <img src="{{ asset('webssets/images/about.png')}}" alt="about" /> </div>
                </div>
                <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                    <h4 class="mb-4 text-right clr-blue">اسماعيلكو</h4>
                    <h2 class="mb-4 text-right clr-dark">من نحن</h2>
                    <p class="mb-4 text-right">
                       {{Illuminate\Support\Str::limit(strip_tags($company->overview ?? ''), $limit = 100, $end = '...')}}

                    </p>
                    <div class="text-right">
                        <a href="#" class="btn btn-primary mt-3 ml-3">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-dark2 services">
        <div class="container">
            <div class="row sec-head">
                <h3 class="text-white ">خدمتنا</h3>
            </div>
            <div class="row mb-5 pl-2">
                <div class="filter-list" style="direction:rtl">
                    <h5 class="text-white sub-head">كل الخدمات</h5>
                </div>
            </div>
            <div class="row" dir="rtl">
                @foreach ($services as $index => $service)
                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry box-shadow">
                        <img src="{{ asset('uploads/products_categories') }}/{{ $service->image }}" alt="{{ asset('uploads/products_categories') }}/{{ $service->image }}" class="w-100" />
                        <div class="text bg-dark3 p-4">
                            <h3 class="heading text-right"><a href="#" class="text-white">{{$service->name}}</a></h3>
                            <p class="text-right text-white">                       {{Illuminate\Support\Str::limit(strip_tags($service->overview ?? ''), $limit = 100, $end = '...')}}
                            </p>
                            <div class="d-flex align-items-center mt-4">
                                <p class="ml-auto mb-0">
                                    <a href="#" class="mr-2">التفاصيل</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="ftco-section bg-light2">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <h2 class="mb-4 clr-dark">لماذا نحن</h2>
                    <p class="clr-gray">
                        مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة
                        قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة
                    </p>
                </div>
            </div>
            <div class="row" style="direction:rtl">
                @foreach ($why_us as $index => $row)

                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="blog-entry">
                        <a href="blog-single.html" class="block-20 d-flex align-items-center box-shadow">
                            <div class="d-flex align-items-center justify-content-center w-100">
                               @isset($why_us[0])
                               <img src="{{ asset('webssets/images/icon-1.png')}}" alt="icon-1.png" class="hw-100"/>

                               @endisset
                               @isset($why_us[1])
                               <img src="{{ asset('webssets/images/icon-2.png')}}" alt="icon-5.png" class="hw-100"/>

                               @endisset
                               @isset($why_us[2])
                               <img src="{{ asset('webssets/images/icon-5.png')}}" alt="icon-5.png" class="hw-100"/>

                               @endisset
                               @isset($why_us[3])
                               <img src="{{ asset('webssets/images/icon-6.png')}}" alt="icon-6.png" class="hw-100"/>

                               @endisset


                            </div>
                            <div class="meta-date text-center p-2">
                                <span class="yr"></span>
                            </div>
                        </a>
                        <div class="text p-4 mt-1 text-center">
                            <h3 class="heading"><a href="#">{{$row->title}}</a></h3>
                            <p>{!!$row->brief!!}</p>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section bg-dark2 services">
        <div class="container">
            <div class="row sec-head">
                <h3 class="text-white glry-header">معرض الصور</h3>
            </div>
            <div class="row">
                <div class="filter-list" style="direction:rtl">
                    <button class="btn btn-default filter-button text-white active" data-filter="all">الكل</button>
                    @foreach ($categories as $row)


                                <button class="btn btn-default filter-button text-white" data-filter="sale{{ $row->id }}">{{ $row->id }}{{ $row->name ?? '' }}
                                </button>

                            @endforeach

                  </div>
            </div>
            <div class="row ftco-animate justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel">
                        @foreach ($galleries as $row)

                        <div class="item product filter sale{{ $row->cat->id ?? ''}} all">
                            <div class="testimony-wrap d-flex">
                                <img src="{{ asset('uploads/galleries') }}/{{ $row->image }}" alt="{{ asset('uploads/galleries') }}/{{ $row->image }}" />
                            </div>
                            <div class="text-box">

                                <h3 class="text-center clr-dark">{{$row->title }}</h3>
                                <h6 class="text-right clr-gray">{!! $row->text !!} </h6>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <p class="mt-4">
                        <a href="#" class="btn btn-primary gallery-btn mt-3 ml-3">معرض الصور</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section services">
        <div class="container">
            <div class="row sec-head">
                <h3 class="clr-dark  artcl-header">المقالات</h3>
            </div>
            <div class="row mb-3 pl-2">
                <div class="filter-list" style="direction:rtl">
                    <h5 class="clr-blue sub-head">كل المقالات</h5>
                </div>
            </div>
            <div class="row mb-3" dir="rtl">
                <div class="col-lg-9">
                    <h6 class="clr-gray text-right" style="font-size:18px">
                        هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان
                        لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة
                    </h6>
                </div>
            </div>
            <div class="row" dir="rtl">
                @foreach ($blogs as $index => $blog)

                <div class="col-md-6 col-lg-4 ftco-animate">
                    <div class="blog-entry box-shadow">
                        <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}" alt="{{ asset('uploads/blogs') }}/{{ $blog->image }}" class="w-100" />
                        <div class="text p-4">
                            <h3 class="heading text-right"><a href="#" class="clr-dark">{{ $blog->title }} </a></h3>
                            <p class="text-right"> {{Illuminate\Support\Str::limit(strip_tags($blog->text ?? ''), $limit = 100, $end = '...')}}</p>
                            <div class="d-flex align-items-center mt-4">
                                <p class="ml-auto mb-0">
                                    <a href="#" class="mr-2">التفاصيل</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>


@endsection
