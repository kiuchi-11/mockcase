@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage">

    <div class="mypage__profile">

        <div class="mypage__profile-image-area">

            @if ($user->image_path)

                <img
                    src="{{ asset('storage/' . $user->image_path) }}"
                    alt="プロフィール画像"
                    class="mypage__profile-image"
                >

            @else

                <div class="mypage__profile-image-default"></div>

            @endif

        </div>

        <div class="mypage__profile-content">

            <h2 class="mypage__user-name">
                {{ $user->name }}
            </h2>

        </div>

        <div class="mypage__profile-button-area">

            <a href="/mypage/profile" class="mypage__edit-button">
                プロフィールを編集
            </a>

        </div>

    </div>

   <div class="mypage__tab">
        <a href="/mypage?page=sell" class="mypage__tab-button {{ $page === 'sell' ? 'mypage__tab-button--active' : '' }}">
            出品した商品
        </a>
        <a
            href="/mypage?page=buy"
            class="mypage__tab-button {{ $page === 'buy' ? 'mypage__tab-button--active' : '' }}"
        >
            購入した商品
        </a>
    </div>

    <div class="mypage__border"></div>

    <div class="mypage__product-list">

    @if ($page === 'sell')

        @forelse ($sellProducts as $product)

            <a href="/item/{{ $product->id }}" class="mypage__product-card">
                <img
                    src="{{ asset('storage/' . $product->image_path) }}"
                    alt="{{ $product->name }}"
                    class="mypage__product-image"
                >
                <p class="mypage__product-name">
                    {{ $product->name }}
                </p>
            </a>
        @empty

            <p class="mypage__empty-message">
                出品した商品はありません
            </p>

        @endforelse

    @elseif ($page === 'buy')

        @forelse ($buyProducts as $product)
        <a href="/item/{{ $product->id }}" class="mypage__product-card">
            <img
                src="{{ asset('storage/' . $product->image_path) }}"
                alt="{{ $product->name }}"
                class="mypage__product-image"
            >
            <p class="mypage__product-name">
                {{ $product->name }}
            </p>
        </a>
        @empty

            <p class="mypage__empty-message">
                購入した商品はありません
            </p>

        @endforelse

    @endif

</div>

</div>

@endsection