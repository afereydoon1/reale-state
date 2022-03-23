@extends('app.layouts.master')

@section('title','نتیجه جست و جو')

@section('content')
    <div class="hero-wrap" style="background-image: url('{{ asset('app-assets/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">خانه</a></span> <span>نتایج جستجو</span></p>
                    <h1 class="mb-3 bread">جستجو</h1>
                </div>
            </div>
        </div>
    </div>

  <section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">آگهی</span>
                <h2 class="mb-4">@php $_GET['search'] @endphp</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach($ads as $item)
                <div class="col-md-4 ftco-animate">
                    <div class="properties">
                        <a href="{{ route('ads.single',$item->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{ str_replace('\\','/',asset($item->image['indexArray']['large'])) }}');">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="icon-search2"></span>
                            </div>
                        </a>
                        <div class="text p-3">
                            <span class="status sale">{{ $item->sellStatus() }}</span>
                            <div class="d-flex">
                                <div class="one">
                                    <h3><a href="property-single.html">{{ $item->address }}</a></h3>
                                    <p>{{ $item->type() }}</p>
                                </div>
                                <div class="two">
                                    <span class="price">{{ $item->amount }} تومان</span>
                                </div>
                            </div>
                            <p>{!! $item->description !!}</p>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="flaticon-selection"></i> {{ $item->area }} متر</span>
                                <span class="ml-auto"><i class="flaticon-bathtub"></i> {{ $item->toilet() }}</span>
                                <span><i class="flaticon-bed"></i> {{ $item->room }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>


<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">بلاگ</span>
                <h2>@php $_GET['search'] @endphp</h2>
            </div>
        </div>
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
        </div>
    </div>
</section>




@endsection
