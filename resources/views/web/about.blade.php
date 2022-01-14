@extends('web.layout.web')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webssets/images/bg_2.png') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center" dir="rtl">
                <div class="col-md-12 ftco-animate text-right">
                    <h1 class="mb-2 bread">من نحن</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html"> الرئيسية <i
                                    class="ion-ios-arrow-back"></i></a></span> <span> من نحن </span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light2">
        <div class="container">
            <div class="row d-flex" dir="rtl">
                <div class="col-md-5 order-md-last wrap-about wrap-about d-flex align-items-stretch">
                    <div class="img"> <img src="{{ asset('webssets/images/about.png') }}" alt="about" /> </div>
                </div>
                <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
                    <h4 class="mb-4 text-right clr-blue">اسماعيلكو</h4>
                    <h2 class="mb-4 text-right clr-dark">من نحن</h2>
                    <p class="mb-4 text-right">
                        {!! $company->overview !!} </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex pb-5" dir="rtl">
                <div class="col-md-6">
                    <div class="img"> <img src="{{ asset('webssets/images/view.png') }}" alt="mission" /> </div>
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <h2 class="mb-4 text-right clr-dark">مهمتنا</h2>
                    <p class="mb-4 text-right clr-gray">
                        {!! $company->mission !!} </p>
                </div>
            </div>
            <div class="row d-flex mt-5" dir="rtl">
                <div class="col-md-6 wrap-about ftco-animate">
                    <h2 class="mb-4 text-right clr-dark">رؤيتنا</h2>
                    <p class="mb-4 text-right clr-gray">
                        {!! $company->vision !!} </p>
                </div>
                <div class="col-md-6">
                    <div class="img"> <img src="{{ asset('webssets/images/vision.png') }}" alt="vission" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
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
                                <h3 class="heading"><a href="#">{{ $row->title }}</a></h3>
                                <p>{!! $row->brief !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="pt-5 pb-5 client-background">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-4 text-right text-white pr-2">اراء العملاء</h2>
                    <p class="mb-4 text-right text-white pr-2">
                        هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل ويُستخدم في صناعات
                        <br />
                        المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي
                    </p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12 col-carousel">
                    <div class="owl-carousel carousel-main1">
                        @foreach ($feedback as $index => $row)
                        <div class="client-item">
                            <div class="row justify-content-center">
                                @if($row->image)
                                <img src="{{ asset('uploads/feedback') }}/{{ $row->image }}" alt="{{ asset('uploads/feedback') }}/{{ $row->image }}" class="clients-img">
                           @else
                           <img src="{{ asset('webssets/images/stuff.png')}}" class="clients-img">
  @endif
                            </div>
                            <div class="text text-center client-text">
                                <h3 class="clr-dark">{{ $row->name }}</h3>
                                <div class="faded">
                                    <p class="clr-gray">
                                        {!! $row->feedback !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <h2 class="mb-4 clr-dark">فريق اسماعيلكو</h2>
                    <p class="clr-gray">
                        مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة
                        قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach ($team as $index => $row)

                <div class="col-md-6 col-lg-3 ftco-animate fadeInUp ftco-animated">
                    <div class="staff">
                        <div class="img-wrap d-flex align-items-stretch">
                            @if($row->image)
                            <div class="img align-self-stretch" style="background-image: url({{ asset('uploads/teams') }}/{{ $row->image }});"></div>
                       @else
                       <div class="img align-self-stretch" style="background-image: url({{ asset('webssets/images/stuff.png')}});"></div>

                       @endif
                        </div>
                        <div class="text pt-3 text-center">
                            <h3> {{ $row->name }}</h3>
                            <div class="faded">
                                <p class="clr-gray">{{ $row->title }}</p>
                                <ul class="ftco-social text-center">
                                    <li class="ftco-animate fadeInUp ftco-animated"><a href="{{ $row->twitter }}"
                                            class="team-icon"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate fadeInUp ftco-animated"><a href="{{ $row->facebook }}"
                                            class="team-icon"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate fadeInUp ftco-animated"><a href="{{ $row->linkedin }}"
                                            class="team-icon"><span class="icon-linkedin"></span></a></li>
                                    <li class="ftco-animate fadeInUp ftco-animated"><a href="{{ $row->instagram }}"
                                            class="team-icon"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="search-course-area bg-3 relative pt-50 pb-50">
        <div id="ourclients">
            <center>
                <h3 class="clr-dark pt-5 pb-5"><b>عملائنا</b></h3>
            </center>
            <div class="container pb-5">
                <section class="customer-logos slider">
                    @foreach ($clients as $index => $row)
                    <div class="slide"><img src="{{ asset('uploads/clients') }}/{{ $row->logo }}"></div>
                    @endforeach

                </section>
            </div>
        </div>
    </section>

@endsection
@section('scripts')
{{-- <script src="{{ asset('webssets/js/main-menu.js')}}"></script> --}}

<script>
    $('.carousel-main1').owlCarousel({
        items: 3,
        loop: true,
        autoplay: true,
        autoplayTimeout: 1500,
        margin: 10,
        nav: true,
        dots: false,
        navText: ['<span class="fas fa-chevron-left fa-2x"></span>', '<span class="fas fa-chevron-right fa-2x"></span>'],
    })
</script>


{{-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script> --}}
{{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
<script>
  $(document).ready(function () {
      $('.customer-logos').slick({
          slidesToShow: 6,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 1500,
          arrows: false,
          dots: false,
          pauseOnHover: false,
          responsive: [{
              breakpoint: 768,
              settings: {
                  slidesToShow: 4
              }
          }, {
              breakpoint: 520,
              settings: {
                  slidesToShow: 3
              }
          }]
      });
  });
</script>
@endsection
