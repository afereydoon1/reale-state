{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('password.update') }}">--}}
{{--            @csrf--}}

{{--            <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--            <div class="block">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}" />--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />--}}
{{--                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-jet-button>--}}
{{--                    {{ __('Reset Password') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}

@extends('auth.layouts.master')

@section('title','تغییر رمز عبور')

@section('content')
    <h2 class="title">رمز عبور خود را فراموش کرده ام</h2>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="input-group">
            <input class="input--style-1 @error('email') is-invalid @enderror" type="email" placeholder="ایمیل" name="email">
            @error('email')
            <span class="invalid-feedback font-weight-bold text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="row row-space">
            <div class="col-2">
                <div class="input-group">
                    <input class="input--style-1 @error('password') is-invalid @enderror" type="password" placeholder="رمز عبور" name="password"
                           value="{{ old('password') }}">
                    @error('password')
                    <span class="invalid-feedback font-weight-bold text-danger">
                {{ $message }}
            </span>
                    @enderror
                </div>
            </div>
            <div class="col-2">
                <div class="input-group">
                    <input class="input--style-1 @error('password_confirmation') is-invalid @enderror" type="password" placeholder="تکرار رمز عبور"
                           name="password_confirmation" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                    <span class="invalid-feedback font-weight-bold text-danger">
                {{ $message }}
            </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="p-t-20 d-flex justify-content-between">

            <button class="btn btn--radius btn--green" type="submit">تغییر رمز عبور</button>
        </div>
    </form>
@endsection
