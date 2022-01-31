<section class="bg-dark4 pt-5 pb-5" style="border-bottom:solid 2px white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center ftco-animate">
                <h3 class="text-white">
                    خبره لأكثر من 21عاما
                </h3>
            </div>
        </div>
    </div>
</section>
<footer class="ftco-footer">
    <div class="ftco-bg-dark ">
        <div class="container">
            <div class="row" dir="rtl">
                <div class="col-md-6 col-lg-4">
                    <div class="ftco-footer-widget mb-5">
                        <h2 class="ftco-heading-2">اسماعيليكو</h2>
                    </div>
                    <div>
                        <p class="text-right">
                            شركة متخصصه في جميع قطاعات الالوميتال والمطابخ والupvc وخبره أكثر من عشرون عاما في  المقاولات العامه والتشطيبات المتكامله
                        </p>
                    </div>
                    <div class="ftco-footer-widget mb-5">
                    <ul class="ftco-footer-social list-unstyled mt-3" style="float:right;padding:0px !important;">
                        <li class="ftco-animate"><a href="{{$contact->twitter}}" target="_blank"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="{{$contact->facebook}}" target="_blank"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="{{$contact->instagram}}" target="_blank"><span class="icon-instagram"></span></a></li>
                        <li class="ftco-animate"><a href="{{$contact->youtube}}" target="_blank"><span class="icon-youtube"></span></a></li>
                        <li class="ftco-animate"><a href="{{$contact->linkedin}}" target="_blank"><span class="icon-linkedin"></span></a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="ftco-footer-widget mb-5 ml-md-4">
                                <h2 class="ftco-heading-2">المنتجات</h2>
                                <ul class="list-unstyled text-right" style="padding:0">
                                    <li><a href="#"><span class="ion-ios-arrow-round-back ml-2"></span>Home</a></li>
                                    <li><a href="#"><span class="ion-ios-arrow-round-back ml-2"></span>About</a></li>
                                    <li><a href="#"><span class="ion-ios-arrow-round-back ml-2"></span>Services</a></li>
                                    <li><a href="#"><span class="ion-ios-arrow-round-back ml-2"></span>Deparments</a></li>
                                    <li><a href="#"><span class="ion-ios-arrow-round-back ml-2"></span>Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ftco-footer-widget mb-5 ml-md-4">
                                <h2 class="ftco-heading-2">روابط</h2>
                                <ul class="list-unstyled text-right" style="padding:0">
                                    <li><a href="{{ LaravelLocalization::localizeUrl('/') }}"><span class="ion-ios-arrow-round-back ml-2"></span>{{ __('links.home') }}</a></li>
                                    <li><a href="{{ LaravelLocalization::localizeUrl('/about-us') }}"><span class="ion-ios-arrow-round-back ml-2"></span>{{ __('links.about_us') }}</a></li>
                                    <li><a href="#"><span class="ion-ios-arrow-round-back ml-2"></span>Services</a></li>
                                    <li><a href="#"><span class="ion-ios-arrow-round-back ml-2"></span>Deparments</a></li>
                                    <li><a href="{{ LaravelLocalization::localizeUrl('/contact') }}"><span class="ion-ios-arrow-round-back ml-2"></span>Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="ftco-footer-widget mb-5">
                        <h2 class="ftco-heading-2">اتصل بنا</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">{!!$contact->address !!}</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">{!!$contact->phone !!}</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">{!!$contact->email !!}</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
    <div class="" style="background:#1B3A4D">
        <div class="container">
          <div class="row">
              <div class="col-md-12 text-center pt-3">
                  <p>
                      Copyright &copy;
                      <script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank">SeniorSteps</a>
                  </p>
              </div>
          </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
