<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>新模擬案件_フリマアプリ</title>
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    @yield('css')
</head>

<body>

<header class="header">
    <div class="header__inner">
        <div class="header__logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="COACHTECH">
            </a>
        </div>
        <div class="header__search">
            <form method="GET" action="/">
                <input
                    type="text"
                    name="keyword"
                    class="header__search-input"
                    placeholder="　　なにをお探しですか？"
                    value="{{ request('keyword') }}"
                >
            </form>
        </div>
        <nav class="header__nav">

    {{-- 未ログイン --}}
    @guest
        <a href="/login" class="header__link">
            ログイン
        </a>

        <a href="/login" class="header__link">
            マイページ
        </a>

        <a href="/login" class="header__button">
            出品
        </a>
    @endguest

    {{-- ログイン済 --}}
    @auth
        <form method="POST" action="{{ route('logout') }}" class="header__logout-form">
            @csrf
            <button type="submit" class="header__link">
                ログアウト
            </button>
        </form>

        <a href="/mypage" class="header__link">
            マイページ
        </a>

        <a href="/sell" class="header__button">
            出品
        </a>
    @endauth

</nav>
    </div>
</header>

<main>
    @yield('content')
</main>

</body>
</html>