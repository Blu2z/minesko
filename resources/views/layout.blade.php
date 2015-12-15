<!DOCTYPE html>
<html>
    <head>
        @yield('header')
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Minessko</title>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="/styles/vendor.css">

    <link rel="stylesheet" href="/styles/main.css">

    </head>
    <body>

    <!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <noscript>
        <p>В браузере отключен javascript!!</p>
    </noscript>
<div class="container">
        @include('parts.index.navigation')
        
        @yield('content')
        
        @include('parts.index.slider_work')
</div>
        @include('parts.index.footer')

        <!--Scripts start-->
        <script src="/scripts/vendor.js"></script>

        <script src="/scripts/main.js"></script>

        <script>
                $('div.slider__head').sliderShop({
                caseLimit: 1, //кол-во товаров в витрине
                spaceSection: 0, //расстояние между секциями
                animation: 'slide', //тип анимации
                timer: 6000, //автопереключение
                repeat: true, //показ слайдов по кругу
                animBox: 'slider__anim', // селектор всплывающих блоков
                countBox: 'slider__ind', //селектор списка
                countSelect: true,
                response: true
            });

            var btn = $('.btn__head'),
            list = $('.head__list li');

            btn.on('click', function (e) {
                e.preventDefault();

                $(this).toggleClass('active').hasClass('active') ? list.slideDown() : list.slideUp();
            });

            $('.slider__work--wrapper').owlCarousel({
                items: 7,
                itemsDesktop : [1000,7], //5 items between 1000px and 901px
                itemsDesktopSmall : [900,7], // betweem 900px and 601px
                itemsTablet: [600,5], //2 items between 600 and 0
                itemsMobile : [500,3], // itemsMobile disabled - inherit from itemsTablet option
                autoHeight : true,
                lazyLoad: true,
                navigation: true,
                pagination: false,
                navigationText: ["назад","вперед"],
                autoPlay: 6000,
                stopOnHover: true
            });

            $(".fancybox").fancybox({
                padding: 0
            });

            $('.carousel--big').owlCarousel({
                items: 1,
                lazyLoad: true,
                navigation: true,
                pagination: false,
                singleItem: true,
                autoHeight: true,
                navigationText: false
            });

            $('.carousel--galery').owlCarousel({
                items: 1,
                lazyLoad: true,
                navigation: true,
                pagination: false,
                singleItem: true,
                autoHeight: true,
                itemsScaleUp: true,
                navigationText: false
            });

            $('.carousel--small').owlCarousel({
                items: 3,
                lazyLoad: true,
                navigation: true,
                pagination: false,
                navigationText: false
            });

            var loc = window.location.href.replace(/[\/]$/, '');

            $('.head').find('a').each(function(index, el) {
                if(loc === $(this).attr('href')) $(this).addClass('active');
            });

        </script>
        
        @yield('scripts')
        
        
        <!--Scripts end-->
    </body>
</html>