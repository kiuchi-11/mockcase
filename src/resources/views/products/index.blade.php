@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')

<div class="product-list">

    <div class="product-list__tabs">

        <a href="/" class="product-list__tab product-list__tab--active">
            おすすめ
        </a>

        <a href="/?tab=mylist" class="product-list__tab">
            マイリスト
        </a>

    </div>

    <div class="product-list__grid">
        @foreach ($products as $product)
            <a href="/item/{{ $product->id }}" class="product-card">
                <div class="product-card__image">
                    <img src="{{ $product->image_path }}" alt="">
                </div>
                <div class="product-card__name">
                    {{ $product->name }}
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection