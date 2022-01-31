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


<section class="ftco-section ftco-no-pt ftco-no-pb contact-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-2 pt-5">
            <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
                <h2 class="mb-4 clr-dark">تواصل معنا</h2>
                <p class="clr-gray">
                    <b>
                        نسعي للوصول إليك في أي وقت وفي كل مكان. رضاك مهمتنا وراحتك هي رؤيتنا
                    </b>
                </p>
            </div>
        </div>
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-lg-6 d-block text-right  p-md-5" dir="rtl">
                <div class="row d-flex">
                    <div class="col-lg-12 d-block text-right mb-3">
                        <h5 class="clr-dark mr-3 mb-4">يرجى الاتصال بنا في حال وجود شكاوي أو استفسارات</h5>
                        <div class="col-md d-flex topper align-items-center align-items-stretch">
                            <div class="icon d-flex justify-content-center align-items-center"><span><img src="{{ asset('webssets/images/icon-location.png')}}" /></span></div>
                            <div class="text">
                                <span class="clr-blue">العنوان</span>
                                <span class="clr-blue2">{!!$contact->address !!}</span>
                                <span></span>
                            </div>
                        </div>
                        <hr style="border: .1px solid #D9D9D9"/>
                    </div>
                    <div class="col-lg-12 d-block text-right mb-3">
                        <div class="col-md d-flex topper align-items-center align-items-stretch">
                            <div class="icon d-flex justify-content-center align-items-center"><span><img src="{{ asset('webssets/images/icon-phone.png')}}" /></span></div>
                            <div class="text">
                                <span class="clr-blue">التليفون</span>
                                <span class="clr-blue2">{!!$contact->phone !!}</span>
                            </div>
                        </div>
                        <hr style="border: .1px solid #D9D9D9" />
                    </div>
                    <div class="col-lg-12 d-block text-right mb-3">
                        <div class="col-md d-flex topper align-items-center align-items-stretch">
                            <div class="icon d-flex justify-content-center align-items-center"><span><img src="{{ asset('webssets/images/icon-location.png')}}" /></span></div>
                            <div class="text">
                                <span class="clr-blue">البريد الالكترونى</span>
                                <span class="clr-blue2">{!!$contact->email !!}</span>
                            </div>
                        </div>
                        <hr style="border: .1px solid #D9D9D9" />
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-4 p-md-5 order-md-last" dir="rtl">
                <form action="{{ LaravelLocalization::localizeUrl('/contact-message') }}" method="post">
                    @csrf
                    <input type="hidden" name="type_id" value="2">
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
</section>

<section class="text-right bg-light">
    <div class="container">
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
                    <div class="card-header {{ $key==0 ? 'active' : '' }}" data-toggle="collapse" href="#collapseOne-{{$row->id}}" aria-expanded="true">
                        <a class="card-title accordion-title" dir="rtl">
                            <span class="icon-paperclip"></span>
                            {{$row->question}}
                        </a>
                    </div>
                    <div id="collapseOne-{{$row->id}}" class="card-body collapse {{ $key==0 ? 'show' : 'collapse' }} " data-parent="#accordion">
                        <p class="clr-gray">
                            {!! $row->answer !!}
                        </p>
                    </div>
                </div>
                <div class="sprt"></div>
                @endforeach


            </div>
        </div>
    </div>
</section>
    </div>
            <div class="sprt"></div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="text-right bg-light">
    <div class="container">
        <h2 class="clr-dark mb-4">الأسئلة الشائعة والتعليقات Newwwwwwwww</h2>
        <p class="clr-gray mb-4">
            <b>
                قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني
            </b>
        </p>
        <div id="accordion" class="accordion">
            <div class="card mb-5">
                <div class="box-shadow">
                    <div class="card-header active" data-toggle="collapse" href="#collapseOne" aria-expanded="true">
                        <a class="card-title accordion-title" dir="rtl">
                            <span class="icon-paperclip"></span>
                            كيفيه أداره الإعدادات
                        </a>
                    </div>
                    <div id="collapseOne" class="card-body collapse show" data-parent="#accordion">
                        <p class="clr-gray">
                            هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال ا لمعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.
                        </p>
                    </div>
                </div>
                <div class="sprt"></div>
                <div class="box-shadow">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <a class="card-title  accordion-title" dir="rtl">
                            <span class="icon-paperclip"></span>
                            ماذا عن وسطاء الحدث والمنظمي ومكبرات الصوت ؟
                        </a>
                    </div>
                    <div id="collapseTwo" class="card-body collapse" data-parent="#accordion">
                        <p class="clr-gray">
                            هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال ا لمعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.
                        </p>
                    </div>
                </div>
                <div class="sprt"></div>
                <div class="box-shadow">
                    <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        <a class="card-title  accordion-title" dir="rtl">
                            <span class="icon-paperclip"></span>
                            ما هي بعض الامثله السيناريوهات ؟
                        </a>
                    </div>
                    <div id="collapseThree" class="card-body collapse" data-parent="#accordion">
                        <p class="clr-gray">
                            هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال ا لمعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق "ليتراسيت" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل "ألدوس بايج مايكر" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.
                        </p>
                    </div>
                </div>
                <div class="sprt"></div>
            </div>
        </div>
    </div>
</section> --}}

<section>
    <div class="row justify-content-center pb-2 pt-5">
        <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
            <h2 class="mb-4 clr-dark">موقعنا</h2>
        </div>
    </div>
    <div>
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="100%" height="500" id="gmap_canvas" src="{{$contact->google_map }}" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org">123movies</a><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 500px;
                        width: 100%;
                    }
                </style><a href="https://www.embedgooglemap.net">google maps iframe code</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 500px;
                        width: 100%;
                    }
                </style>
            </div>
        </div>
    </div>
</section>

@endsection
