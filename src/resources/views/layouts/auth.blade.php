<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    @yield('css')

</head>

<body>

<header class="header">
    <div class="header__logo">
        <img src="{{ asset('images/logo.png') }}" alt="COACHTECH">
    </div>
</header>

<main class="auth-main">
    @yield('content')
</main>

</body>
</html>