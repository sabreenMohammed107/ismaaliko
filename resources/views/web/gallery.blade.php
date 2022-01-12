@extends('web.layout.web')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('webssets/images/bg_2.png')}}');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" dir="rtl">
            <div class="col-md-12 ftco-animate text-right">
                <h1 class="mb-2 bread">معرض الصور</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="{{ LaravelLocalization::localizeUrl('/') }}"> الرئيسية <i class="ion-ios-arrow-back"></i></a></span> <span> تواصل معنا </span></p>
            </div>
        </div>
    </div>
</section>

<section class="portfolio section ftco-gallery">
    <div class="container container-wrap" dir="rtl">
        <div class="filters">
            <ul>
                <li class="active" data-filter="*">الكل</li>
                @foreach ($categories as $row)


                <li class="bg-cat1" data-filter=".{{ $row->id }}" onclick="stoping()">{{ $row->name ?? '' }}
                </li>

            @endforeach

                <li data-filter=".cam" class="bg-cat2"><i class="ion-ios-camera"></i></li>
                <li data-filter=".vdo" class="bg-cat2"><i class="ion-ios-play"></i></li>
            </ul>
        </div>
        <div class="filters-content">
            <div class="row grid">
                @foreach ($galleries as $row)

                <div
                    class="col-sm-4 all {{ $row->cat->id ?? '' }} @if ($row->type == 1)
                    cam
        @else
        vdo
        @endif">

        <div class="item">
            <div class="content">
            @if ($row->type == 1)
            <a href="{{ asset('uploads/galleries')}}/{{ $row->image }}" class="gallery image-popup img d-flex align-items-center" >

                <div class="content-overlay"></div>
                          <img class="content-image" src="{{ asset('uploads/galleries') }}/{{ $row->image }}" alt="{{ asset('uploads/galleries') }}/{{ $row->image }}">
                          <div class="content-details fadeIn-bottom">
                              <h3 class="text-white mb-4">{{ $row->title }}</h3>
                              <p class="text-white">{{ $row->text }}</p>
                          </div>

            </a>
            @else
                <a class="play-btn" href="{{ $row->image }}">
                    <div class="img img-video d-flex align-items-center " style="height: 350px !important;">

                        <iframe src="{{ $row->image }}" style=" width: 100%;
                            height: 100%;
                            position: absolute;
                            object-fit: cover;
                            z-index: 0;" frameborder="0"></iframe>
                        <div>
                            <i class="fa fa-play text-white fz-18"></i>
                        </div>
                    </div>
                </a>
            @endif
            </div>
        </div>
    </div>
@endforeach


            </div>
        </div>

    </div>
</section>



@endsection
@section('scripts')
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<script>
    		$('.filters ul li').click(function () {
			$('.filters ul li').removeClass('active');
			$(this).addClass('active');

			var data = $(this).attr('data-filter');
			$grid.isotope({
				filter: data
			})
		});

		var $grid = $(".grid").isotope({
			itemSelector: ".all",
			percentPosition: true,
			masonry: {
				columnWidth: ".all"
			}
		})
$(function(){
    $('.bg-cat1').click(function(){
        $('iframe').attr('src', $('iframe').attr('src'));
    });
    $('.bg-cat2').click(function(){
        $('iframe').attr('src', $('iframe').attr('src'));
    });
});
</script>

@endsection
