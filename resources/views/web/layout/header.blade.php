
  	<header id="header">
        {{-- <div class="bg-top navbar-light top-header" style="border-bottom:solid .5px #D9D9D9">
            <div class="container">
                <div class="row no-gutters d-flex align-items-center align-items-stretch pt-3" dir="rtl">
                    <div class="col-md-6 d-flex align-items-center">
                        <a class="navbar-brand" href="{{ LaravelLocalization::localizeUrl('/') }}"><img src="{{ asset('webssets/images/logo.png')}}" alt="logo" /></a>
                    </div>
                    <div class="col-lg-6 d-block text-right">
                        <div class="row d-flex">
                            <div class="col-md d-flex topper align-items-center align-items-stretch">
                                <div class="icon d-flex justify-content-center align-items-center"><span><img src="{{ asset('webssets/images/icon-location.png')}}"  alt="address"/></span></div>
                                <div class="text">
                                    <span>العنوان</span>
                                    <span>{!! $contact->address !!}</span>
                                </div>
                            </div>
                            <div class="col-md d-flex topper align-items-center align-items-stretch">
                                <div class="icon d-flex justify-content-center align-items-center"><span><img src="{{ asset('webssets/images/icon-phone.png')}}" alt="phone" /></span></div>
                                <div class="text">
                                    <span>التليفون</span>
                                    <span>{!! $contact->phone!!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="bg-top navbar-light top-header" style="border-bottom:solid .5px #D9D9D9">
            <div class="container">
                <div class="row no-gutters d-flex align-items-center align-items-stretch pt-3" dir="rtl">
                    <div class="col-md-6 d-flex align-items-center">
                        <a class="navbar-brand" href="{{ LaravelLocalization::localizeUrl('/') }}"><img src="{{ asset('webssets/images/logo.png')}}" alt="logo" /></a>
                      <div class="text-right pr-5 shown">
                          <div class="col-md d-flex topper">
                              <div class="icon d-flex justify-content-end align-items-end"><span><img src="{{ asset('webssets/images/icon-phone.png')}}" alt="phone" /></span></div>
                              <div class="text">
                                  <span>التليفون</span>
                                  <span>{!! $contact->phone!!}</span>
                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-6 d-block text-right">
                        <div class="row d-flex">
                            <div class="col-md d-flex topper align-items-center align-items-stretch">
                                <div class="icon d-flex justify-content-center align-items-center"><span><img src="{{ asset('webssets/images/icon-location.png')}}"  alt="address" class="hide"  /></span></div>
                                <div class="text hide">
                                    <span>العنوان</span>
                                    <span>{!! $contact->address !!}</span>
                                </div>
                            </div>
                            <div class="col-md d-flex topper align-items-center align-items-stretch">
                                <div class="icon d-flex justify-content-center align-items-center"><span><img src="{{ asset('webssets/images/icon-phone.png')}}" alt="phone" class="hide"  /></span></div>
                                <div class="text hide">
                                    <span>التليفون</span>
                                    <span>{!! $contact->phone!!}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- NAV -->
        <div class="container pr-2" dir="rtl">
          <nav class="navbar navbar-expand-lg"style="padding-right:0px">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"><i class="icon icon-bars"></i></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto text-right w-100 pr-0">
                      <li class="nav-item">
                          <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/') }}">{{ __('links.home') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/about-us') }}">{{ __('links.about_us') }}</a>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ __('links.products') }}
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <div class="container">
                                  <div class="row">
                                      @foreach ($product_categories as $category )
                                      <div class="col-md-3 text-right">
                                        <a href="{{ LaravelLocalization::localizeUrl('/products/'.$category->id) }}" class="clr-dark"><b>{{$category->name}}</b></a>
                                        <ul class="nav flex-column text-right">
                                            @foreach ($category->product as $product)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/single-product/' . $product->id) }}">{{$product->name}}</a>
                                            </li>
                                            @endforeach


                                        </ul>
                                    </div>
                                      @endforeach


                                  </div>
                                  <div class="row">
                                      <div class="col-md-12 w-100">
                                          <img src="{{ asset('webssets/images/menu.png')}}" class="w-100" />
                                      </div>
                                  </div>
                              </div>
                              <!--  /.container  -->


                          </div>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/web-gallery') }}"> {{ __('links.gallery') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/blogs') }}"> {{ __('links.blog') }}</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/contact') }}">  {{ __('links.contact_us') }}</a>
                      </li>
                  </ul>
                  <!--<form class="form-inline">
                      <input class="form-control" type="search" placeholder="البحث" aria-label="Search">
                  </form>-->
              </div>


          </nav>
        </div>
        <!-- /NAV -->
    </header>
  <!-- END nav -->
