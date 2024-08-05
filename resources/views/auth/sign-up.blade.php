@extends('layouts.layout')
@section('title', ($seo_title) ?? __('Регистрация') )
@section('description', ($seo_description)?? __('Регистрация') )
@section('keywords', ($seo_keywords)?? __('Регистрация') )
@section('content')

    <div class="auth  block">
        <div class="pageRegister">
            <div class="pageRegister__left">
                <div class="formRegister">
                <x-forms.auth-form
                    title="{{__('Регистрация') }}"
                    subtitle="{{__('Введите ваши личные данные') }}"
                    action="{{ route('register.handle') }}"
                    method="POST"
                >
                    <div class="text_input">
                    <x-forms.text-input
                        type="text"
                        id="registerName"
                        name="name"
                        placeholder="Имя"
                        value="{{ old('name') }}"
                        required="true"
                        :isError="$errors->has('name')"
                    />
                    @error('name')
                    <x-forms.error>
                        {{ $message }}
                    </x-forms.error>
                    @enderror
                    </div>

                    <div class="text_input">
                    <x-forms.text-input
                        type="email"
                        id="registerEmail"
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

                    <div class="text_input">
                    <x-forms.text-input
                        type="password"
                        id="registerPassword"
                        name="password"
                        placeholder="Пароль"
                        required="true"
                        :isError="$errors->has('password')"
                    />

                    @error('password')
                    <x-forms.error>
                        {{ $message }}
                    </x-forms.error>
                    @enderror
                    </div>

                    <div class="text_input">
                    <x-forms.text-input
                        type="password"
                        id="registerPassword_confirmation"
                        name="password_confirmation"
                        placeholder="Повторите пароль"
                        required="true"
                        :isError="$errors->has('email')"
                    />

                    @error('password_confirmation')
                    <x-forms.error>
                        {{ $message }}
                    </x-forms.error>
                    @enderror
                    </div>


           <x-forms.cabinet.radio />



                    <x-slot:buttons>
                        <div class="slotButtons">
                            <x-forms.primary-button>
                               {{ __('Зарегистрироваться') }}
                            </x-forms.primary-button>
                            <div class="slotButtons__security securityAuth">
                                <div class="securityAuth__left">
                                    <img src="{{ asset('/images/auth/security.svg') }}" alt="security" width="16" height="16" />

                                </div>
                                <div class="securityAuth__right">
                                    <div class="color_grey color_grey_14">Ваши данные под защитой и будут использованы только для статистических данных.</div>
                                </div>
                            </div>
                        </div>
                    </x-slot:buttons>
                </x-forms.auth-form>
                </div>
            </div>
            <div class="pageRegister__right">
            </div>

        </div>
    </div>





@endsection
