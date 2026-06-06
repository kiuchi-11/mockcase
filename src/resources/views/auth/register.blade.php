@extends('layouts.auth')

@section('title', '会員登録')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="register">

    <h1 class="register__title">会員登録</h1>

    <form method="POST" action="{{ route('register') }}" class="register__form" novalidate>
        @csrf

        <div class="register__group">
            <label class="register__label">ユーザー名</label>
            <input type="text" name="name" class="register__input" value="{{ old('name') }}">

            @error('name')
                <p class="register__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="register__group">
            <label class="register__label">メールアドレス</label>
            <input type="email" name="email" class="register__input" value="{{ old('email') }}">

            @error('email')
                <p class="register__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="register__group">
            <label class="register__label">パスワード</label>
            <input type="password" name="password" class="register__input">

            @error('password')
                <p class="register__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="register__group">
            <label class="register__label">確認用パスワード</label>
            <input type="password" name="password_confirmation" class="register__input">
        </div>

        <button type="submit" class="register__button">
            登録する
        </button>

        <p class="register__login">
            <a href="{{ route('login') }}">ログインはこちら</a>
        </p>

    </form>

</div>
@endsection