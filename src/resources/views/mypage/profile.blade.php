@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile">

    <h1 class="profile__title">
        プロフィール設定
    </h1>

    <form method="POST" action="/mypage/profile" enctype="multipart/form-data" class="profile__form">
        @csrf

        <div class="profile__image-group">

            <div class="profile__image-preview">
                @if(Auth::user()->image_path)
                    <img src="{{ asset('storage/' . Auth::user()->image_path) }}" class="profile__image">class="profile__image">
                @else
                    <div class="profile__image-placeholder"></div>
                @endif
            </div>

            <label class="profile__image-button">
                画像を選択する
                <input type="file" name="image" class="profile__file">
            </label>

            @error('image')
                <p class="profile__error">{{ $message }}</p>
            @enderror

        </div>

        <div class="profile__group">
            <label class="profile__label">
                ユーザー名
            </label>

            <input
                type="text"
                name="name"
                class="profile__input"
                value="{{ old('name', Auth::user()->name) }}"
            >

            @error('name')
                <p class="profile__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile__group">
            <label class="profile__label">
                郵便番号
            </label>

            <input
                type="text"
                name="postal_code"
                class="profile__input"
                value="{{ old('postal_code', Auth::user()->postal_code) }}"
            >

            @error('postal_code')
                <p class="profile__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile__group">
            <label class="profile__label">
                住所
            </label>

            <input
                type="text"
                name="address"
                class="profile__input"
                value="{{ old('address', Auth::user()->address) }}"
            >

            @error('address')
                <p class="profile__error">{{ $message }}</p>
            @enderror
        </div>

        <div class="profile__group">
            <label class="profile__label">
                建物名
            </label>

            <input
                type="text"
                name="building"
                class="profile__input"
                value="{{ old('building', Auth::user()->building) }}"
            >
        </div>

        <button type="submit" class="profile__button">
            更新する
        </button>

    </form>

</div>
@endsection