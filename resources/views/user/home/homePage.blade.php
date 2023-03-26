<!DOCTYPE html>
<html lang="en">

<head>
    @if (url()->current() == route('user#homePage'))
        <title>Home</title>
    @else
        <title>@yield('title')</title>
    @endif
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no" />
    <link rel="icon" href="{{ asset('user/images/favicon.ico') }}">
    <link rel="shortcut icon" href="{{ asset('user/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('user/css/camera.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/component.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('user/css/tooltipster.css') }}" />
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="{{ asset('user/js/jquery.js') }}"></script>
    <script src="{{ asset('user/js/jquery-migrate-1.2.1.js') }}"></script>
    <script src="{{ asset('user/js/script.js') }}"></script>
    <script src="{{ asset('user/js/superfish.js') }}"></script>
    <script src="{{ asset('user/js/jquery.ui.totop.js') }}"></script>
    <script src="{{ asset('user/js/jquery.equalheights.js') }}"></script>
    <script src="{{ asset('user/js/jquery.mobilemenu.js') }}"></script>
    <script src="{{ asset('user/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('user/js/jquery.tooltipster.js') }}"></script>
    <script src="{{ asset('user/js/camera.js') }}"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="{{ asset('user/js/jquery.mobile.customized.min.js') }}"></script>
    <!--<![endif]-->
    <script src="{{ asset('user/js/modernizr.custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            jQuery('#camera_wrap').camera({
                loader: 'pie',
                pagination: true,
                minHeight: '200',
                thumbnails: true,
                height: '40.85106382978723%',
                caption: true,
                navigation: true,
                fx: 'mosaic'
            });
            $().UItoTop({
                easingType: 'easeOutQuart'
            });
            $('.tooltip').tooltipster();

        });
    </script>

    <!--[if lt IE 9]>
       <div style=' clear: both; text-align:center; position: relative;'>
         <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
           <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
         </a>
      </div>
      <script src="js/html5shiv.js"></script>
      <link rel="stylesheet" media="screen" href="css/ie.css">


    <![endif]-->
</head>

<body class="page1" id="top">

    <!--==============================header=================================-->
    <header>
        <div class="container_12">
            <div class="grid_12">
                <h1>
                    <a href="">
                        <img src="{{ asset('user/images/logo.png') }}" alt="Your Happy Family">
                    </a>
                </h1>
                <div class="menu_block">
                    <nav class="horizontal-nav full-width horizontalNav-notprocessed">
                        <ul class="sf-menu">
                            <li><a class="text-decoration-none" href="{{ route('user#homePage') }}">Home</a></li>
                            <li><a class="text-decoration-none" href="{{ route('user#aboutPage') }}">About</a></li>
                            <li><a class="text-decoration-none" href="{{ route('user#productPage') }}">Property</a>
                            </li>
                            <li><a class="text-decoration-none" href="{{ route('user#createPage') }}">Create</a></li>
                            <li><a class="text-decoration-none" href="{{ route('user#contactPage') }}">Contact</a></li>
                            <li><a class="text-decoration-none" href="{{ route('user#accountPage') }}">Account</a></li>
                        </ul>
                    </nav>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </header>

    @if (url()->current() == route('user#homePage'))
        <div class="container_12">
            <div class="grid_12">
                <div class="slider_wrapper ">
                    <div class="camera_wrap" id="camera_wrap">
                        <div data-thumb="images/thumb.png" data-src="{{ asset('user/images/slide.jpg') }}">
                            <div class="caption fadeFromBottom">
                                Clever interior projects for your home
                            </div>
                        </div>
                        <div data-thumb="images/thumb1.jpg" data-src="{{ asset('user/images/slide1.jpg') }}">
                            <div class="caption fadeFromBottom">
                                Home improvement ideas for you
                            </div>
                        </div>
                        <div data-thumb="images/thumb2.png" data-src="{{ asset('user/images/slide2.jpg') }}">
                            <div class="caption fadeFromBottom">
                                Premium design tips
                            </div>
                        </div>
                        <div data-thumb="images/thumb3.png" data-src="{{ asset('user/images/slide3.jpg') }}">
                            <div class="caption fadeFromBottom">
                                Only creative ideas
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="page1_block">
            <div class="container_12">
                <div class="grid_12">
                    <div class="center">
                        <h2>Welcome!</h2>
                        Our company offers you the best design solutions to make your home interior unique and stylish

                    </div>
                </div>
            </div>
        </div>
    @else
        @yield('content')
    @endif
    <!--==============================Content=================================-->
    <div class="container_12">
        <div class="grid_12 center">
            <h3>Services</h3>
        </div>
        <div class="grid_3">
            <h4>Articles</h4>
            <img src="{{ asset('user/images/page1_img1.jpg') }}" alt="" class="img_inner">
            Lorem ipsum dolor sit t,tetur adipiscing elit. In molliseri eratttis neque facilisi
            <div class="alright"><a href="#" class="btn">More</a></div>
        </div>
        <div class="grid_3">
            <h4>Color Analysis</h4>
            <ul class="list">
                <span href="#">Lorem ipsum dolor sit </span>
                <span href="#">Amet,tetur adipiscing elit</span>
                <span href="#">In mollis eratttis neque </span>
                <span href="#">Facilisis, sit amet ultretr</span>
                <span href="#">Icies erat rutrums facilisis</span>
                <span href="#">Nulla vel viverra auctoreo</span>
                <span href="#">Magna sodales felis, quis</span>
            </ul>
            <div class="alright"><a href="#" class="btn">More</a></div>
        </div>
        <div class="grid_3">
            <h4>Accessory Installation</h4>
            <ul class="list">
                <span href="#">Morem ipsum dolor site</span>
                <span href="#">Kmet,tetur adipiscing eli</span>
                <span href="#">In mollis eratttis nequ </span>
                <span href="#">Facilisis, sit amet ultretre</span>
                <span href="#">Cies erat rutrums facilis </span>
                <span href="#">Kulla vel viverra auctore</span>
                <span href="#">Bagna sodales felisquik </span>
            </ul>
            <div class="alright"><a href="#" class="btn">More</a></div>
        </div>
        <div class="grid_3">
            <h4>Floral Design</h4>
            <ul class="list">
                <span href="#">Korem ipsum dolor sitilo</span>
                <span href="#">Pmet, tetur adipiscing eli</span>
                <span href="#">On mollis eratttis nequ </span>
                <span href="#">Gacilisis, sit amet ultre</span>
                <span href="#">Mcies erat rutrumsu </span>
                <span href="#">Vacilisis Nulla vel uivra </span>
                <span href="#">Nuctoreo Magna sodale </span>
            </ul>
            <div class="alright"><a href="#" class="btn">More</a></div>
        </div>
    </div>
    <!--==============================footer=================================-->
    <footer>
        <div class="container_12">

            <div class="grid_12">

                <div class="socials">

                    <section id="twitter">
                        <a href="#" target="_blank"><span id="twitter-default" class="tooltip"
                                title="Follow us on Twitter">t</span></a>
                    </section>
                    <section id="google">
                        <a href="#" target="_blank"><span id="google-default" class="tooltip"
                                title="Follow us on Google Plus">g<span>+</span></span></a>
                    </section>
                    <section id="rss">
                        <a href="#" target="_blank"><span id="rss-default" class="tooltip"
                                title="Follow us on Dribble">d</span></a>
                    </section>
                </div>
                <div class="copy">
                    YourHome &copy; 2014 | <a href="#">Privacy Policy</a> <br> Website designed by <a
                        href="http://www.templatemonster.com/" rel="nofollow">TemplateMonster.com </a>
                </div>

            </div>
        </div>
    </footer>
    <script src="{{ asset('user/js/classie.js') }}"></script>

    <script src="{{ asset('user/js/thumbnailGridEffects.js') }}"></script>

</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>

</html>
