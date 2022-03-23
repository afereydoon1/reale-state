<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="direction: rtl;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">Royal<span>estate</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> منو
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{ route('home') }}" class="nav-link">خانه</a></li>
                <li class="nav-item {{ request()->is('ads') ? 'active' : '' }}"><a href="{{ route('ads.home.index') }}" class="nav-link">آگهی ها</a></li>
                <li class="nav-item {{ request()->is('about') ? 'active' : '' }}"><a href="{{ route('about') }}" class="nav-link">درباره ما</a></li>
                <li class="nav-item {{ request()->is('blog') ? 'active' : '' }}"><a href="{{ route('blog.home.index') }}" class="nav-link">بلاگ</a></li>
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->user_type == 1 )
                        <li class="nav-item bg-success"><a href="{{ route('admin.home') }}" class="nav-link ml-lg-1 mr-lg-5 text-white"><span class="icon-user m-2 text-white"></span>پنل ادمین</a></li>
                        <form class="nav-item bg-danger" action="{{ route('logout') }}" method="post">
                            @csrf
                            <li><button type="submit" class="nav-link ml-lg-1 mr-lg-5 text-white mt-3 btn-outline-danger border-0"><span class="icon-user m-2 text-white"></span>خروج</button></li>
                        </form>
                    @else
                        <li class="nav-item bg-success"><a href="#" class="nav-link ml-lg-1 mr-lg-5 text-white"><span class="icon-user m-2 text-white"></span>{{ \Illuminate\Support\Facades\Auth::user()->full_name }}</a></li>
                        <form class="nav-item bg-danger" action="{{ route('logout') }}" method="post">
                            @csrf
                            <li><button type="submit" class="nav-link ml-lg-1 mr-lg-5 text-white mt-3 btn-outline-danger border-0"><span class="icon-user m-2 text-white"></span>خروج</button></li>
                        </form>
                    @endif
                @else
                    <li class="nav-item cta"><a href="{{ route('login') }}" class="nav-link ml-lg-1 mr-lg-5"><span class="icon-user m-2"></span>ورود</a></li>
                    <li class="nav-item cta cta-colored"><a href="{{ route('register') }}" class="nav-link"><span class="icon-pencil m-2"></span>ثبت نام</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
