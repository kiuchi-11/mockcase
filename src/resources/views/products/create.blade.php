@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell">

    <h1 class="sell__title">商品の出品</h1>

    @if ($errors->any())
        <div class="sell__errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/sell" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- 商品画像 -->
        <div class="sell__section">

            <p>商品画像</p>

            <div class="sell__image-box">
                <label class="sell__image-btn">

                    画像を選択する

                    <input
                        type="file"
                        name="image"
                        class="sell__image-input"
                    >

                </label>
            </div>

        </div>

        <!-- 商品詳細 -->
        <div class="sell__section">

            <label class="sell__label">
                商品の詳細
            </label>

            <div class="sell__divider"></div>

            <p>カテゴリー</p>

            <div class="sell__categories">

                @foreach($categories as $category)

                    @if($category->name !== 'その他')

                        <label class="sell__category">

                            <input
                                type="checkbox"
                                name="categories[]"
                                value="{{ $category->id }}"
                                {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}
                            >

                            <span class="sell__category-text">
                                {{ $category->name }}
                            </span>

                        </label>

                    @endif

                @endforeach

            </div>

            <p>商品の状態</p>

            <select name="condition_id" class="sell__select">

                <option value="">
                    選択してください
                </option>

                @foreach($conditions as $condition)

                    <option
                        value="{{ $condition->id }}"
                        {{ old('condition_id') == $condition->id ? 'selected' : '' }}
                    >
                        {{ $condition->name }}
                    </option>

                @endforeach

            </select>

        </div>

        <!-- 商品名と説明 -->
        <div class="sell__section">

            <label class="sell__label">
                商品名と説明
            </label>

            <div class="sell__divider"></div>

            <p>商品名</p>

            <input
                type="text"
                name="name"
                class="sell__input"
                value="{{ old('name') }}"
            >

            <p>ブランド名</p>

            <input
                type="text"
                name="brand_name"
                class="sell__input"
                value="{{ old('brand_name') }}"
            >

            <p>商品の説明</p>

            <textarea
                name="description"
                class="sell__textarea"
            >{{ old('description') }}</textarea>

        </div>

        <!-- 価格 -->
        <div class="sell__section">

            <p>販売価格</p>

            <div class="sell__price">

                <span>￥</span>

                <input
                    type="number"
                    name="price"
                    class="sell__input"
                    value="{{ old('price') }}"
                >

            </div>

        </div>

        <button type="submit" class="sell__button">
            出品する
        </button>

    </form>

</div>
@endsection