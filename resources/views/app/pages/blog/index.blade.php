@extends('app.layouts.master')

@section('title','بلاگ ها')

@section('content')
    <div class="hero-wrap" style="background-image: url('{{ asset('app-assets/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">خانه</a></span> <span>بلاگ</span></p>
                    <h1 class="mb-3 bread">بلاگ ها</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                @foreach($posts as $item)
                    <div class="col-md-3 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="{{ route('blog.single',$item->id) }}" class="block-20"
                               style="background-image: url('{{ str_replace('\\','/',asset($item->image['indexArray']['large'])) }}');">
                            </a>
                            <div class="text mt-3 d-block">
                                <h3 class="heading mt-3"><a href="#">{{ $item->title }}</a>
                                </h3>
                                <div class="meta mb-3">
                                    <div><a href="#">{{ jdate($item->created_at)->format('%B %d، %Y') }}</a></div>
                                    <div><a href="#">{{ $item->user->full_name }}</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> ۳</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {!! $posts->links('app.pages.paginate') !!}
        </div>
    </section>
@endsection
