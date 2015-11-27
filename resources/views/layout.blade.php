<!DOCTYPE html>
<html>
    <head>
        @yield('header')
        <title>Fashion</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="/packages/css/all.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="nav navbar-nav navbar-right">
                        <a href="{{ url('/') }}" class="btn btn-success">Главная</a>
                        <a href="{{ url('about') }}" class="btn btn-success">О нас</a>
                        <a href="{{ url('services') }}" class="btn btn-success">Услуги</a>
                        <a href="{{ url('news') }}" class="btn btn-success">Новости</a>
                        <a href="{{ url('collections') }}" class="btn btn-success">Коллекции</a>
                        <a href="{{ url('contacts') }}" class="btn btn-success">Контакты</a>
                        <a href="{{ url('photogalleries') }}" class="btn btn-success">Фотогалерея</a>
                    @if (!Auth::check())
                        <a href="{{ url('administration/login') }}" class="btn btn-success">Log in</a>
                    @else
                        <a href="{{ url('log-out') }}" class="btn btn-success">Log out</a>
                    @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>

        <!--Scripts start-->
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
        <!--Scripts end-->
    </body>
</html>