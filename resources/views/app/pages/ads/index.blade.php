@extends('app.layouts.master')

@section('title','لیست آگهی')

@section('content')
    <div class="hero-wrap" style="background-image: url('{{ asset('app-assets/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">خانه</a></span> <span>آگهی ها</span></p>
                    <h1 class="mb-3 bread">آگهی ها</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section bg-light">
        <div class="container">
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

            {!! $ads->links('app.pages.paginate') !!}
        </div>
    </section>
@endsection
