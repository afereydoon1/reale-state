{{--<x-guest-layout>--}}
{{--    <x-jet-authentication-card>--}}
{{--        <x-slot name="logo">--}}
{{--            <x-jet-authentication-card-logo />--}}
{{--        </x-slot>--}}


{{--        @if (session('status'))--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ session('status') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <x-jet-validation-errors class="mb-4" />--}}

{{--        <form method="POST" action="{{ route('password.email') }}">--}}
{{--            @csrf--}}

{{--            <div class="block">--}}
{{--                <x-jet-label for="email" value="{{ __('Email') }}" />--}}
{{--                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />--}}
{{--            </div>--}}

{{--            <div class="flex items-center justify-end mt-4">--}}
{{--                <x-jet-button>--}}
{{--                    {{ __('Email Password Reset Link') }}--}}
{{--                </x-jet-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-jet-authentication-card>--}}
{{--</x-guest-layout>--}}

@extends('auth.layouts.master')

@section('title','فراموشی رمز عبور')

@section('content')
    <h2 class="title">رمز عبور خود را فراموش کرده ام</h2>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <div class="input-group">
            <input class="input--style-1 @error('email') is-invalid @enderror" type="email" placeholder="ایمیل بازیابی رمز عبور" name="email">
            @error('email')
            <span class="invalid-feedback font-weight-bold text-danger">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="p-t-20 d-flex justify-content-between">

            <button class="btn btn--radius btn--green" type="submit">ایمیل بازیابی رمز عبور</button>

        </div>
    </form>
@endsection
