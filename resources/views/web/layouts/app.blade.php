<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=2,minimum-scale=1" user-scalable="yes">

    <title>Alumni Association of Varendra University </title>
    <meta name="keyword" content="">
    <meta name="description" content="">
    <meta name="author" content="Varendra University">

    @stack('css')
    <link rel="shortcut icon" href="https://vu.edu.bd/img/ico/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/uikit/css/uikit.min.css')}}">
    <link rel="stylesheet" href="https://vu.edu.bd/css/bootstrap.css">
    <link rel="stylesheet" href="https://vu.edu.bd/css/breakingNews.css">
    <link rel="stylesheet" href="https://vu.edu.bd/css/main.css?t={{time()}}">
    <link rel="stylesheet" href="https://vu.edu.bd/css/main2.css?t={{time()}}">
    <link rel="stylesheet" href="https://vu.edu.bd/css/camera.css">
    <link rel="stylesheet" href="https://vu.edu.bd/css/style.css?t={{time()}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="https://vu.edu.bd/css/aly.css">
    <link rel="stylesheet" href="https://vu.edu.bd/css/styles.css?t=1659260650">
    <link rel="stylesheet" href="https://vu.edu.bd/css/custom-slike.css?t=1659260650">
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.7" type="text/css" media="screen" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Updock&display=swap">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.7"></script>
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.fancybox').fancybox({
                openEffect: 'fade',
                closeEffect: 'fade',
                nextEffect: 'fade',
                prevEffect: 'fade',
                openSpeed: 'slow',
                closeSpeed: 'slow',
                nextSpeed: 'slow',
                prevSpeed: 'slow'
            });

        });
    </script>
    <style type="text/css">
        html {
            overflow: auto;
        }

        .modal {
            background-color: #000C;
        }

        th {
            background-color: c44d2d;
            color: white;
        }

        .btn.btn-sm {
            padding: 2px 14px;
            font-size: 12px;
            letter-spacing: 1px;
        }
    </style>
    <style type="text/css">
        .btn-success {
            background-color: #c44d2d;
        }

        .btn-success:hover {
            background-color: #0f0f0f;
        }

        body {
            font-size: 16px;
        }

        .mobile-hide {
            display: inline-block;
        }

        @media (max-width:450px) {
            .mobile-hide {
                display: none;
            }
        }

        .desktop-hide {
            display: none;
        }

        @media (max-width:450px) {
            .desktop-hide {
                display: inline-block;
            }
        }

        .emp-login-btn {
            background-color: #c44d2d;
            color: white !important;
            padding: 5px;
            border-top-left-radius: 32px;
            border-bottom-left-radius: 30px;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            text-decoration: none !important;
            padding-right: 15px;
            padding-left: 15px;
            font-weight: 700;
        }

        .emp-login-btn:hover {
            background-color: black;
            color: white !important;
            padding: 5px;
            border-top-left-radius: 32px;
            border-bottom-left-radius: 30px;
            border-top-right-radius: 30px;
            border-bottom-right-radius: 30px;
            text-decoration: none !important;
            padding-left: 15px;
            padding-right: 15px;
            font-weight: 700;
        }

        .emp-login-btn .fas {
            color: white;
            background-color: #c44d2d;
            text-decoration: none;
            padding: 0px 6px !important;
        }

        .emp-login-btn:hover .fas {
            color: white;
            background-color: black;
            text-decoration: none;
            padding: 0px 6px !important;
        }
    </style>
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f0f0f0;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #c44d2d55;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #c44d2d;
        }
        .page-body {
		max-width: none !important;
	}
    </style>
    @if (Agent::isMobile())
    <style>

    .l-gnav-sub-inner{
        height: 100%;
    }
    .l-gnav-sub{
        height: 60vh;
    }
    .dropdown-menu>li>a{
        font-size: 12px;
    }
    .l-header__logo-en{
        height: 100%;
    }
    </style>

    @else

    @endif
    @stack('style')
</head>

<body class="vu_top_eng" style="overflow: hidden;">
    <h1 hidden>{{ $title ?? 'Varendra University' }}</h1>
    {{-- .l-wrapper --}}
    <div class="l-wrapper">
        <noscript>JavaScript is required to display the Varendra University website correctly. Please enable JavaScript
            in your browser settings and refresh the page.</noscript>

        {{-- HEADER --}}
        @include('web.layouts.components.header')

        {{-- /HEADER --}}

        {{-- GNAV --}}

        @include('web.layouts.components.desktop_menu')

        {{-- /GNAV --}}

        @include('web.layouts.components.mobile_menu')

        {{-- MAIN --}}

        <div class="page-body">
            @yield('main')
        </div>
        @include('web.layouts.components.footer')

    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('assets/uikit/js/uikit.min.js')}}"></script>
<script src="{{asset('assets/uikit/js/uikit-icons.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.1/remodal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/equalize.js/1.0.1/equalize.min.js"></script>
<script src="https://vu.edu.bd/css/main.js"></script>
<script>
    $(window).load(function() {
        $('.imgList01').equalize('width');
        $('.imgList01').equalize();
    });
</script>
<script type="text/javascript">
    $('.slider').slick({
        autoplay: true,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        fade: true,
        dotsClass: 'news-dots',
        mobileFirst: true,
        focusOnSelect: true,
        pauseOnHover: true,
        pauseOnFocus: true,
        // adaptiveHeight: true,
        responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: true,
                    // centerMode: true,
                    // centerPadding: '40px',
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    // centerMode: true,
                    // centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
</script>
<script type="text/javascript">
    $('.news-slide').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 1500,
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        dotsClass: 'news-dots',
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
</script>
<script type="text/javascript">
    $('.event-slide').slick({
        dots: false,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 1000,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        dotsClass: 'news-dots',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },

            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]

    });
    $('.event-list-slider').slick({
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        // vertical: true,
        // verticalSwiping: true,
        focusOnSelect: true,
        pauseOnHover: true,
        pauseOnFocus: true,
    });
</script>
<script>
    $('.publication-count-slider').slick({
        autoplay: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplaySpeed: 1000,
        arrows: false,
        dots: false,
        vertical: true,
        // verticalSwiping: true,
        focusOnSelect: true,
        pauseOnHover: true,
        pauseOnFocus: true,
    });
</script>

<script>
    $('.office-event-slider').slick({
        autoplay: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        vertical: false,
        verticalSwiping: true,
        focusOnSelect: true,
        pauseOnHover: true,
        pauseOnFocus: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
</script>
<script type="text/javascript">
    $('.notice-slider').slick({
        autoplay: true,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplaySpeed: 1000,
        arrows: false,
        dots: false,
        vertical: true,
        verticalSwiping: true,
        focusOnSelect: true,
        pauseOnHover: true,
        pauseOnFocus: true,
    });
</script>
<script type="text/javascript">
    $('.video-slide').slick({

        dots: false,

        infinite: true,

        autoplay: false,

        // autoplaySpeed: 1000,

        speed: 500,

        slidesToShow: 1,

        slidesToScroll: 1,

        // dotsClass: 'news-dots',

        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }

            },

            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },

            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

            // You can unslick at a given breakpoint now by adding:

            // settings: "unslick"

            // instead of a settings object

        ]

    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.0/jquery.cookie.js"></script>
<script type="text/javascript">
    var seconds = document.getElementById("countdown").textContent;
    var countdown = setInterval(function() {
        seconds--;
        document.getElementById("countdown").textContent = seconds;
        if (seconds <= 0) clearInterval(countdown);
    }, 1000);

    jQuery(document).ready(function() {
        function openFancybox() {
            setTimeout(function() {
                jQuery('#popuplink').trigger('click');
                setTimeout(function() {
                    $.fancybox.close();
                }, 20000)
            }, 500);
        };
        var visited = jQuery.cookie('visited');
        if (visited == 'yes') {
            // second page load, cookie active
            openFancybox();
        } else {
            openFancybox(); // first page load, launch fancybox
        }
        jQuery.cookie('visited', 'yes', {
            expires: 365 // the number of days cookie  will be effective
        });
        jQuery("#popuplink").fancybox({
            modal: true,
            maxWidth: 1024,
            overlay: {
                closeClick: true
            }
        });
    });
</script>
<script>
    function blink_text() {
        $('.blink-light').fadeOut(500);
        $('.blink-light').fadeIn(500);
    }
    setInterval(blink_text, 2000);
</script>
@stack('js')
@stack('script')
</html>
