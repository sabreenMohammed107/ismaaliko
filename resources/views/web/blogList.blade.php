<div class="row">
    @foreach ($blogs as $blog)
        <div class="col-lg-12  mb-4">
            <div class="text-right box-shadow">
                <p>
                    <img src="{{ asset('uploads/blogs') }}/{{ $blog->image }}"
                        alt="{{ asset('uploads/blogs') }}/{{ $blog->image }}" style="height: 350px !important" class="img-fluid  w-100">
                </p>
                <div class="p-3">
                    <h5 class="mb-3 clr-dark"><b>{{ $blog->title }}</b></h5>
                    <p class="clr-gray">
                        {{ Illuminate\Support\Str::words(strip_tags($blog->text ?? ''), 50) }}
                    </p>
                    <div class="text-left">
                        <p class="ml-auto mb-0">
                            <a href="{{ LaravelLocalization::localizeUrl('/single-blog/' . $blog->id . '/' . $blog->slug) }}"
                                class="mr-2"> قراءة المزيد <i class="ion-ios-arrow-back"></i><i
                                    class="ion-ios-arrow-back"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

</div>
<div class="row mt-4">
<nav class="blog-pagination d-flex justify-content-center align-items-center w-100">
    <ul class="pagination">
        @for ($i = 1; $i <= $blogs->lastPage(); $i++)
            <!-- a Tag for another page -->
            <li class="page-item p-no  {{ $blogs->currentPage() == $i ? ' active' : '' }}"> <a
                    href="{{ $blogs->url($i) }}" class="page-link">{{ $i }}</a></li>
        @endfor

    </ul>
</nav>
</div>
