<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @include('auth.layouts.head-tag')
</head>

<body dir="rtl">
<div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
    <div class="wrapper wrapper--w680">
        <div class="card card-1">
            <div class="card-heading"></div>
            <div class="card-body">
                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('auth.layouts.scripts')

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
