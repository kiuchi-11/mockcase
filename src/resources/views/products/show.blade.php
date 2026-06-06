@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<div class="item-detail">
    <div class="item-detail__image-area">
        <img
            src="{{ $product->image_path }}"
            alt="{{ $product->name }}"
            class="item-detail__image"
        >
    </div>
    <div class="item-detail__content">
        <h1 class="item-detail__name">
            {{ $product->name }}
        </h1>
        <p class="item-detail__brand">
            {{ $product->brand_name }}
        </p>
        <div class="item-detail__price">
            ¥{{ number_format($product->price) }}
        </div>
        <div class="item-detail__reaction">
            <div class="item-detail__reaction-item">
                ☆
                <span>0</span>
            </div>
            <div class="item-detail__reaction-item">
                💬
                <span>0</span>
            </div>
        </div>
        <a href="#" class="item-detail__purchase-button">
            購入手続きへ
        </a>
        <div class="item-detail__section">
            <h2 class="item-detail__section-title">
                商品説明
            </h2>
            <p class="item-detail__description">
                {{ $product->description }}
            </p>
        </div>
        <div class="item-detail__section">
            <h2 class="item-detail__section-title">
                商品の情報
            </h2>
            <div class="item-detail__info">
                <div class="item-detail__info-row">
                    <div class="item-detail__info-label">
                        カテゴリー
                    </div>
                    <div class="item-detail__info-value">
                        @foreach($product->categories as $category)
                            <span class="item-detail__category">
                                {{ $category->content }}
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="item-detail__info-row">
                    <div class="item-detail__info-label">
                        商品の状態
                    </div>
                    <div class="item-detail__info-value">
                        {{ $product->condition->content }}
                    </div>
                </div>
            </div>
        </div>
        <div class="item-detail__section">
            <h2 class="item-detail__section-title">
                コメント（0）
            </h2>
            <div class="item-detail__comment-empty">
                コメントはまだありません
            </div>
        </div>
    </div>
</div>
@endsection