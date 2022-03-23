@extends('app.layouts.master')

@section('title','پست')

@section('content')
    <div class="hero-wrap" style="background-image: url('{{ asset('app-assets/images/bg_1.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                            class="mr-2"><a href="index.html">خاه</a></span> <span class="mr-2"><a href="blog.html">بلاگ ها</a></span>
                        <span>صفحه داخلی بلاگ</span></p>
                    <h1 class="mb-3 bread">بلاگ</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $post->title }}</h2>
                    <p>
                        <img src="{{ str_replace('\\','/',asset($post->image['indexArray']['large'])) }}" alt="" class="img-fluid">
                    </p>
                    <p>{!! $post->body !!}</p>

                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">مسکن</a>
                            <a href="#" class="tag-cloud-link">فروش</a>
                            <a href="#" class="tag-cloud-link">اخبار</a>
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
                            @foreach($postCategories as $item)
                                <li><a href="{{ route('blog.category',$item->id) }}">{{ $item->name }}<span>(12)</span></a></li>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3>اخرین بلاگ ها</h3>
                        @foreach($latestPosts as $item)
                            <div class="block-21 mb-4 d-flex">
                                <a class="blog-img mr-4"
                                   style="background-image: url('{{ str_replace('\\','/',asset($item->image['indexArray']['large'])) }}');"></a>
                                <div class="text">
                                    <h3 class="heading"><a href="{{ route('blog.single',$item->id) }}">{{ $item->title }}</a></h3>
                                    <div class="meta">
                                        <div><a href="{{ route('blog.single',$item->id) }}"><span class="icon-calendar"></span> {{ jdate($item->created_at)->format('%B %d، %Y') }}</a></div>
                                        <div><a href="{{ route('blog.single',$item->id) }}"><span class="icon-person"></span> {{ $item->user->full_name }}</a></div>
                                        <div><a href="{{ route('blog.single',$item->id) }}"><span class="icon-chat"></span> ۱۹</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->
@endsection
