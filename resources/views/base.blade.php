<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel 7 & MySQL CRUD Tutorial</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="container">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
        <div class="container">
            <a href="/" class="navbar-brand">Адмінка</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive">
                Menu
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Головна</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contacts.index')}}">Контакти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index')}}">Категорії</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products.index')}}">Товари</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Реєстрація</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Вхід</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('main')
</div>
<script src="{{ asset('js/app.js') }}" ></script>
<script>
    // $(function() {
    //     alert("Hello");
    // });
</script>

@yield('scripts')
</body>
</html>
