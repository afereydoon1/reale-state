@extends('app.layouts.master')

@section('title','صفحه اصلی')

@section('content')
    <section class="home-slider owl-carousel">
        @foreach($slides as $slide)
            <div class="slider-item" style="background-image: url('{{ str_replace('\\','/',asset($slide->image)) }}');">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row no-gutters slider-text align-items-md-end align-items-center justify-content-end">
                        <div class="col-md-6 text p-4 ftco-animate" style="direction: rtl;">
                            <h1 class="mb-3">{{ $slide->title }}</h1>
                            <span class="location d-block mb-3"><i class="icon-my_location"></i> {{ $slide->address }}</span>
                            <p>{!! $slide->body !!}</p>
                            <span class="price">{{ $slide->amount }} تومان  </span>
                            <a href="{{ $slide->url }}" class="btn-custom p-3 px-4 bg-primary">مشاهده جزئیات<span class="icon-plus mr-1"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </section>

    <section class="ftco-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12 search-wrap">
                    <h2 class="heading h5 d-flex align-items-center pr-4"><span class="ion-ios-search mr-3"></span>جستوجو</h2>
                    <form action="{{ route('search') }}" class="search-property" method="get">
                        <div class="row">
                            <div class="col-md align-items-end">
                                <div class="form-group">
                                    <label for="#">عنوان اگهی</label>
                                    <div class="form-field">
                                        <div class="icon"><span class="icon-pencil "></span></div>
                                        <input type="text" name="search" class="form-control text-right" placeholder="عنوان">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md align-self-end">
                                <div class="form-group">
                                    <div class="form-field">
                                        <input type="submit" value="جستوجو" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-pin"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">پیدا کردن خانه در هرجای </h3>
                            <p>به راحتی در هرجای ایران خانه موردنظر خود را انتخاب کنید</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-detective"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">نمایندگان فعال</h3>
                            <p>نمایندگان فعال در سراسر کشور</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-sel Searchf-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-house"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">خرید و یا اجاره</h3>
                            <p>دسته بندی جدا خانه های خریدنی و یا اجاره کردنی</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-purse"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">دو سر سود</h3>
                            <p>منفعت برای خریدار و فروشنده</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-properties">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">نمایش جدید ترین</span>
                    <h2 class="mb-4"> اگهی ها</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="properties-slider owl-carousel ftco-animate">
                        @foreach($latestAds as $item)
                            <div class="item">
                                <div class="properties">
                                    <a href="{{ route('ads.single',$item->id) }}" class="img d-flex justify-content-center align-items-center" style="background-image: url('{{ str_replace('\\','/',asset($item->image['indexArray']['medium'])) }}');">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <span class="status sale">{{$item->sellStatus()}}</span>
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="#">{{ $item->address }}</a></h3>
                                                <p>{{$item->type()}}</p>
                                            </div>
                                            <div class="two">
                                                <span class="price">{{$item->amount}} تومان</span>
                                            </div>
                                        </div>
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
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">پیشنهادات ویژه</span>
                    <h2 class="mb-4">بهترین اگهی ها</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                @foreach($bestAds as $item)
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="properties">
                            <a href="{{ route('ads.single',$item->id) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{ str_replace('\\','/',asset($item->image['indexArray']['medium'])) }}');">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-search2"></span>
                                </div>
                            </a>
                            <div class="text p-3">
                                <span class="status sale">{{ $item->sellStatus() }}</span>
                                <div class="d-flex">
                                    <div class="one">
                                        <h3><a href="#">{{ $item->address }}</a></h3>
                                        <p>{{ $item->type() }}</p>
                                    </div>
                                    <div class="two">
                                        <span class="price">{{$item->amount}} تومان</span>
                                    </div>
                                </div>
                                <p>{!! $item->description !!}</p>
                                <hr>
                                <p class="bottom-area d-flex">
                                    <span><i class="flaticon-selection mx-1"></i>متر {{$item->area}}</span>
                                    <span class="ml-auto"><i class="flaticon-bathtub"></i> {{$item->toilet()}}</span>
                                    <span><i class="flaticon-bed"></i> {{$item->room}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url('{{ asset('app-assets/images/bg_1.jpg') }}');">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4">برخی اطلاعات جالب</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{ $posts->count() }}">0</strong>
                                    <span>پست ها</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{ $ads->count() }}">0</strong>
                                    <span>آگهی ها</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="{{ $users->count() }}">0</strong>
                                    <span>کاربران</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>همکاران ما</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">مقالات</span>
                    <h2>آخرین بلاگ ها</h2>
                </div>
            </div>
            <div class="row d-flex">
                @foreach($posts as $item)
                    <div class="col-md-3 d-flex ftco-animate">
                        <div class="blog-entry align-self-stretch">
                            <a href="{{ route('blog.single',$item->id) }}" class="block-20" style="background-image: url('{{ str_replace('\\','/',asset($item->image['indexArray']['large'])) }}');">
                            </a>
                            <div class="text mt-3 d-block">
                                <h3 class="heading mt-3"><a href="#">{{ $item->title }}</a></h3>
                                <div class="meta mb-3">
                                    <div><a href="#">{{ jdate($item->created_at )->format('%B %d، %Y') }}</a></div>
                                    <div><a href="#">{{ $item->user->full_name }}</a></div>
                                    <div><a href="#" class="meta-chat"><span class="icon-chat"></span> {{ $item->view }}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
