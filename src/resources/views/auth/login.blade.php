@extends('layouts.auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="register">
    <h1 class="register__title">
        ログイン
    </h1>
    <form method="POST" action="/login" class="register__form">
        @csrf
        <div class="register__group">
            <label class="register__label">
                メールアドレス
            </label>
            <input
                type="email"
                name="email"
                class="register__input"
                value="{{ old('email') }}"
            >
            @error('email')
                <p class="register__error">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="register__group">
            <label class="register__label">
                パスワード
            </label>
            <input
                type="password"
                name="password"
                class="register__input"
            >
            @error('password')
                <p class="register__error">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit" class="register__button">
            ログインする
        </button>
        <p class="login__register">
            <a href="/register" class="register__link">会員登録はこちら</a>
        </p>
    </form>
</div>
@endsection