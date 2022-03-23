@extends('app.layouts.master')

@section('title','درباره ما')

@section('content')
    <div class="hero-wrap" style="background-image: url('{{ asset('app-assets/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{ route('home') }}">خانه</a></span> <span class="mr-2"><a href="blog.html">آگهی ها</a></span> <span>صفحه داخلی آگهی</span></p>
                    <h1 class="mb-3 bread">آگهی ها</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $ad->title }}</h2>
                    <img src="{{ str_replace('\\','/',asset($ad->image['indexArray']['large'])) }}" alt="" class="img-fluid">
                    </p>
                    <p>{!! $ad->description !!}</p>

                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">مسکن</a>
                            <a href="#" class="tag-cloud-link">فروش</a>
                            <a href="#" class="tag-cloud-link">اخبار</a>
                        </div>
                    </div>
                    <div class="d-md-flex mt-5 mb-5" dir="rtl">
                        <ul>
                            <li><span>متراژ : </span> {{ $ad->area }} متر</li>
                            <li><span>اتاق خواب : </span> {{ $ad->room }} </li>
                            <li><span>سرویس بهداشتی : </span> {{ $ad->toilet() }} </li>
                            <li><span>پارکینگ : </span> {{ $ad->parking() }} </li>
                            <li><span>نوع آگهی : </span> {{ $ad->type() }} </li>
                        </ul>
                        <ul class="ml-md-5">
                            <li><span>نوع کفپوش : </span>{{ $ad->floor }}</li>
                            <li><span>سال ساخت : </span> {{ $ad->year }}</li>
                            <li><span>انباری : </span> {{ $ad->storeRoom() }}</li>
                            <li><span>بالکن : </span> {{ $ad->balcony() }}</li>
                            <li><span>وضعیت : </span> {{ $ad->sellStatus() }}</li>
                        </ul>
                    </div>
                    <div class="col-md-12 properties-single ftco-animate mb-5 mt-5">
                        <h4 class="mb-4">آگهی های مرتبط</h4>
                        <div class="row">
                            <div class="col-md-6 ftco-animate">
                                <div class="properties">
                                    <a href="property-single.html" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('app-assets/images/properties-1.jpg') }}');">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <span class="status sale">خرید</span>
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="property-single.html">تهرانپارس شرقی</a></h3>
                                                <p>آپارتمان</p>
                                            </div>
                                            <div class="two">
                                                <span class="price">۸۸۸۸۸ تومان</span>
                                            </div>
                                        </div>
                                        <p>با بهترین امکانات و قیمت بسیار مناسب</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span><i class="flaticon-selection"></i> ۱۰۰ متر</span>
                                            <span class="ml-auto"><i class="flaticon-bathtub"></i> ۲</span>
                                            <span><i class="flaticon-bed"></i> ۱</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 ftco-animate">
                                <div class="properties">
                                    <a href="property-single.html" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('app-assets/images/properties-1.jpg') }}');">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3">
                                        <span class="status sale">خرید</span>
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="property-single.html">تهرانپارس شرقی</a></h3>
                                                <p>آپارتمان</p>
                                            </div>
                                            <div class="two">
                                                <span class="price">۸۸۸۸۸ تومان</span>
                                            </div>
                                        </div>
                                        <p>با بهترین امکانات و قیمت بسیار مناسب</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span><i class="flaticon-selection"></i> ۱۰۰ متر</span>
                                            <span class="ml-auto"><i class="flaticon-bathtub"></i> ۲</span>
                                            <span><i class="flaticon-bed"></i> ۱</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5 mt-5">
                        <h3 class="mb-5">نظرات</h3>
                        <ul class="comment-list">
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>نیما کریمی</h3>
                                    <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                    <p>خیلی عالی بود ممنون</p>
                                    <p><a href="#" class="reply">پاسخ</a></p>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>نیما کریمی</h3>
                                    <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                    <p>خیلی عالی بود ممنون</p>
                                    <p><a href="#" class="reply">پاسخ</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="images/person_1.jpg" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>نیما کریمی</h3>
                                            <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                            <p>خیلی عالی بود ممنون</p>
                                            <p><a href="#" class="reply">پاسخ</a></p>
                                        </div>


                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard bio">
                                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>نیما کریمی</h3>
                                                    <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                                    <p>خیلی عالی بود ممنون</p>
                                                    <p><a href="#" class="reply">پاسخ</a></p>
                                                </div>
                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard bio">
                                                            <img src="images/person_1.jpg" alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>نیما کریمی</h3>
                                                            <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                                            <p>خیلی عالی بود ممنون</p>
                                                            <p><a href="#" class="reply">پاسخ</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>نیما کریمی</h3>
                                    <div class="meta">۲/۲/۱۳۹۸ ۲۲:۲۱</div>
                                    <p>خیلی عالی بود ممنون</p>
                                    <p><a href="#" class="reply">پاسخ</a></p>
                                </div>
                            </li>
                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">درج نظر</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="name">نام و نام خانوادگی *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">ایمیل *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">وبسایت</label>
                                    <input type="url" class="form-control" id="website">
                                </div>

                                <div class="form-group">
                                    <label for="message">پیام</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="ارسال نطر" class="btn py-3 px-4 btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->

                <div class="col-lg-4 sidebar ftco-animate">

                    <div class="sidebar-box ftco-animate">
                        <div class="categories">
                            <h3>دسته بندی ها</h3>
                            @foreach($adsCategories as $item)
                                <li><a href="{{ route('ads.category',$item->id) }}">{{ $item->name }}<span>(12)</span></a></li>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>اخرین آگهای ها</h3>
                        @foreach($latestAds as $item)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4" style="background-image: url('{{ str_replace('\\','/',asset($item->image['indexArray']['large'])) }}');"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="{{ route('ads.single',$item->id) }}">{{ $item->title }}</a></h3>
                                    <div class="meta">
                                        <div><a href="{{ route('ads.single',$item->id) }}"><span class="icon-calendar"></span>{{ jdate($item->created_at)->format('%B %d، %Y') }}</a></div>
                                        <div><a href="{{ route('ads.single',$item->id) }}"><span class="icon-person"></span>{{ $item->user->full_name ?? ''}}</a></div>
                                        <div><a href="{{ route('ads.single',$item->id) }}"><span class="icon-chat"></span> ۱۹</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                </div>
            </div>
    </section>
@endsection
