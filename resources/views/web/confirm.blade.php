@extends('web.layout.web')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webssets/images/bg_2.png')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" dir="rtl">
            <div class="col-md-12 ftco-animate text-right">
                <h3 class="mb-2 bread">تواصل معنا</h3>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ LaravelLocalization::localizeUrl('/') }}"> الرئيسية <i class="ion-ios-arrow-back"></i></a></span> <span> تواصل معنا </span></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-light2">
<section class="hero-wrap hero-wrap-2" >

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div id="confirm">
                    <div class="icon icon--order-success svg add_bottom_15">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" style="display: block;margin:auto">
                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                            </g>
                        </svg>
                    </div>
                    @if(Session::has('flash_success'))
                    {{-- <h2>Order completed!</h2> --}}
                    <p style="margin: auto;text-align:center;padding:10px 0">{{session('flash_success') }}!</p>

                @endif
                @if(Session::has('flash_danger'))
                {{-- vv
                <h2>Order completed!</h2> --}}
                <p>{{session('flash_danger') }}!</p>
                @endif
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

</div>
</section>
</section>
@endsection
