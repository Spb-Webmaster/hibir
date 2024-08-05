@extends('layouts.layout')
@section('title', ($seo_title) ?? __('Забыли пароль'))
@section('description', ($seo_description)?? __('Забыли пароль'))
@section('keywords', ($seo_keywords)?? __('Забыли пароль'))
@section('content')
    <div class="auth  block">
        <div class="pageForgot">
    <x-forms.auth-form
        title="{{ __('Забыли пароль') }}"
        subtitle="{{  __('Введите почту с которым зарегистрировались на сайте') }}"
        action="{{ route('forgot.handel') }}"
        method="POST"
    >
        <div class="text_input">

        <x-forms.text-input
            type="email"
            id="forgotEmail"
            name="email"
            placeholder="E-mail"
            required="true"
            value="{{ old('email') }}"
            :isError="$errors->has('email')"
        />
        @error('email')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror
        </div>

        <x-slot:buttons>
            <div class="slotButtons">

        <x-forms.primary-button>
            {{  __('Отправить') }}
        </x-forms.primary-button>

                <div class="slotButtonsCenter text_center"><a href="{{ route('login') }}" class="text-white hover:text-white/70 font-bold">Вспомнил пароль</a></div>

            </div>

        </x-slot:buttons>
    </x-forms.auth-form>
        </div>
    </div>
@endsection
