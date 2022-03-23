{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form method="POST" action="{{ route('login') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />--}}
{{--            </div>--}}

{{--            <div class="block mt-4">--}}
{{--                <label for="remember_me" class="flex items-center">--}}
{{--                    <x-jet-checkbox id="remember_me" name="remember" />--}}
{{--                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
{{--                </label>--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot your password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Log in') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}

@extends('auth.layouts.master')

@section('title','ورود')

@section('content')
    <h2 class="title">فرم ورود</h2>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="input-group">
            <input class="input--style-1 @error('email') is-invalid @enderror" type="email" placeholder="ایمیل" name="email">
            @error('email')
            <span class="invalid-feedback font-weight-bold text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="input-group">
            <input class="input--style-1 @error('password') is-invalid @enderror" type="password" placeholder="رمز عبور" name="password"
                   value="{{ old('password') }}">
            @error('password')
            <span class="invalid-feedback font-weight-bold text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="d-flex mt-4 ">
            <label for="remember_me">
                <input type="checkbox" id="remember_me" name="remember" />
                <span class="text-sm text-gray-600">مرا به خاطر بسپار</span>
            </label>
        </div>

        <div class="p-t-20 d-flex justify-content-between">

                <button class="btn btn--radius btn--green" type="submit">ثبت نام</button>

                @if (Route::has('password.request'))
                    <a class="text-decoration-none text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        رمز عبور خود را فراموش کرده ام
                    </a>
                @endif

        </div>
    </form>
@endsection
