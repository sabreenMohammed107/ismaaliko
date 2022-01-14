@extends('web.layout.web')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webssets/images/bg_2.png')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" dir="rtl">
            <div class="col-md-12 ftco-animate text-right">
                <h1 class="mb-2 bread">المنتجات</h1>
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
                    <div class="col-lg-12 ftco-animate mb-4">
                        <div class="container">
                            <!-- Flickity HTML init -->
                            <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                               @foreach ($row->images as $img)
                               <div class="carousel-cell w-100"><img src="{{ asset('uploads/products') }}/{{ $img->image }}" alt="{{ asset('uploads/products') }}/{{ $img->image }}" class="w-100"/></div>
                               @endforeach


                            </div>

                            <div class="carousel carousel-nav" data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                                @foreach ($row->images as $img)
                                <div class="carousel-cell"><img src="{{ asset('uploads/products') }}/{{ $img->image }}" /></div>
                                @endforeach

                            </div>

                        </div><!-- /.container -->
                    </div>

                    <div class="col-lg-12 ftco-animate mb-4">
                        <div class="row">
                            <div class="col-lg-12 p-3">
                                <h5 class="mb-3 clr-dark text-right"><b>الكتالوج</b></h5>
                            </div>
                            <div class="col-lg-5 p-3">
                                <table class="table product-tbl">
                                    <thead>
                                        <tr>
                                            <th scope="col">الموقع</th>
                                            <th scope="col">المواصفات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($row->feature as $feature)
                        <tr>
                            <td><b>{{$feature->title}}</b></td>
                            <td>{{$feature->value}}</td>
                        </tr>
                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-7 p-3">
                                <p class="clr-gray text-right">
                                    <img src="{{ asset('uploads/products') }}/{{ $row->image_catalog }}" alt="{{ asset('uploads/products') }}/{{ $row->image_catalog }}" class="img-fluid pro-img w-100">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 ftco-animate mb-4 bg-light p-3">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="img img-video d-flex align-items-center h-200" style="background-image: url({{ asset('uploads/products') }}/{{ $row->image }});">
                                    <div class="video justify-content-center">
                                        <a href="{{ asset('uploads/products') }}/{{ $row->vedio }}" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                                            <span class="ion-ios-play"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="p-3">
                                    <h5 class="mb-3 clr-dark text-right"><b>{{ $row->name }}</b></h5>
                                    <p class="clr-gray text-right">
                                        {!! $row->overview !!}
                                       </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="row justify-content-center mb-5 pb-2">
                            <div class="col-md-12 text-right heading-section ftco-animate fadeInUp ftco-animated">
                                <h2 class="mb-4 clr-dark">لماذا نحن</h2>
                                <p class="clr-gray">
                                    مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة
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
                    <div class="col-lg-12 text-right bg-light pt-5">
                        <h2 class="clr-dark mb-4">الأسئلة الشائعة والتعليقات</h2>
                        <p class="clr-gray mb-4">
                            <b>
                                قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني
                            </b>
                        </p>
                        <div id="accordion" class="accordion">
                            <div class="card mb-5">
                                @foreach ($faq as $key=>$row)
                                <div class="box-shadow">
                                    <div class="card-header {{ $key == 0 ? 'active' : '' }}" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                        <a class="card-title accordion-title" dir="rtl">
                                            <span class="icon-paperclip"></span>
                                            {{$row->question}}
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="card-body collapse {{ $key==0 ? 'show' : 'collapse' }}" data-parent="#accordion">
                                        <p class="clr-gray">
                                            {!! $row->answer !!}
                                        </p>
                                    </div>
                                </div>
                                @endforeach

                                <div class="sprt"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 p-4 order-md-last bg-light" dir="rtl">
                        <h3 class="clr-dark mb-4 text-right">للحصول على عرض سعر</h3>
                        <form action="{{ LaravelLocalization::localizeUrl('/product-message') }}" method="post">
                            @csrf
                            <input type="hidden" name="type_id" value="1">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="الاسم">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="البريد الالكتروني">
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" class="form-control" placeholder="رقم الهاتف">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="" cols="30" rows="3" class="form-control" placeholder="تفاصيل الرسالة"></textarea>
                            </div>
                            <div class="form-group text-right">
                                <!--<input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">-->
                                {{-- <a href="#" class="btn btn-primary btn-outline-primary mt-3">ارسال</a> --}}
                                <input class="btn btn-primary btn-outline-primary mt-3" type="submit" value="{{ __('links.send_msg') }}">
                            </div>
                        </form>
                    </div>
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
                        <h3 class="heading pt-3"><a href="#" class="clr-dark">{{ $latest->title }}</a></h3>
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
<script src="https://npmcdn.com/flickity@2/dist/flickity.pkgd.js"></script>
@endsection
