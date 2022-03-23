{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo/>--}}
{{--        </x-slot>--}}

{{--        <x-jet-validation-errors class="mb-4"/>--}}

{{--        <form method="POST" action="{{ route('register') }}">--}}
{{--            @csrf--}}

{{--            <div>--}}
{{--                <x-jet-label for="name" value="{{ __('Name') }}"/>--}}
{{--                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required--}}
{{--                             autofocus autocomplete="name"/>--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}"/>--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"--}}
{{--                             required/>--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password" value="{{ __('Password') }}"/>--}}
{{--                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required--}}
{{--                             autocomplete="new-password"/>--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}"/>--}}
{{--                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"--}}
{{--                             name="password_confirmation" required autocomplete="new-password"/>--}}
{{--            </div>--}}

{{--            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())--}}
{{--                <div class="mt-4">--}}
{{--                    <x-jet-label for="terms">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <x-jet-checkbox name="terms" id="terms"/>--}}

{{--                            <div class="ml-2">--}}
{{--                                {!! __('I agree to the :terms_of_service and :privacy_policy', [--}}
{{--                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',--}}
{{--                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',--}}
{{--                                ]) !!}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </x-jet-label>--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

{{--                <x-jet-button class="ml-4">--}}
{{--                    {{ __('Register') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}


@extends('auth.layouts.master')

@section('title','ثبت نام')

@section('content')
    <h2 class="title">فرم ثبت نام</h2>

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-group">
            <input class="input--style-1 @error('full_name') is-invalid @enderror" type="text"
                   placeholder="نام و نام خانوادگی" name="full_name" value="{{ old('full_name') }}" >
            @error('full_name')
            <span class="invalid-feedback font-weight-bold text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>

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

            <button class="btn btn--radius btn--green" type="submit">ثبت نام</button>

            @if (Route::has('password.request'))
                <a class="text-decoration-none text-sm text-gray-600 hover:text-gray-900 " href="{{ route('login') }}">
                    قبلا ثبت نام کرده ام
                </a>
            @endif

        </div>
    </form>
@endsection
