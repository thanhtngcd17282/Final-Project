<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>WeKam TV</title>
    <!--meta tags -->
    <meta charset="UTF-8">
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!--//meta tags ends here-->
    <!--booststrap-->
    <link href="{{asset('css/homepage/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <!--//booststrap end-->
    <!-- font-awesome icons -->
    <link href="{{asset('css/homepage/fontawesome-all.min.css')}}" rel="stylesheet" type="text/css" media="all">
    <!-- //font-awesome icons -->
    <!-- Nav-CSS -->
    <link href="{{asset('css/homepage/nav.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script src="{{asset('js/homepage/modernizr.custom.js')}}"></script>
    <!-- //Nav-CSS -->
    <!-- banner -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/homepage/uncover.css')}}" />
    <!--//banner -->
    <!--stylesheets-->
    <link href="{{ asset('css/homepage/style.css')}}" rel='stylesheet' type='text/css' media="all">
    <!--//stylesheets-->
    <link href="//fonts.googleapis.com/css?family=Cinzel+Decorative:400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
</head>

<body>
    <div class="header-outs" id="home">
        <div class="header-w3layouts">
            <div class="container">
                <div class="right-side">
                    <p>
                        <button id="trigger-overlay" type="button">
                            <span class="fa fa-bars" aria-hidden="true"></span>
                        </button>
                    </p>
                </div>
                <!-- open/close -->
                <div class="overlay overlay-hugeinc">
                    <button type="button" class="overlay-close">Close</button>
                    <nav>
                        <ul>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="hedder-logo">
                    <h1><a href="home2.blade.php">WeKam TV</a>
                    </h1>
                </div>
                <!-- /open/close -->
                <!-- /navigation section -->
            </div>
            <div class="clearfix"> </div>
        </div>
        <!--banner-->
        <div class="slides text-center">
            <div class="slide slide--current one-img ">
                <div class="slider-up">
                    <h4>WeKam TV</h4>
                    <h5></h5>
                    <div class="outs_more-buttn">
                    <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                <div class="slide__img">
                </div>
            </div>
            <div class="slide two-img">
                <div class="slider-up">
                    <h4>WeKam TV</h4>
                    <h5></h5>
                    <div class="outs_more-buttn">
                    <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                <div class="slide__img"></div>
            </div>
            <div class="slide three-img">
                <div class="slider-up">
                    <h4>WeKam TV</h4>
                    <h5></h5>
                    <div class="outs_more-buttn">
                    <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                <div class="slide__img "></div>
            </div>
            <div class="slide four-img">
                <div class="slider-up">
                    <h4>WeKam TV</h4>
                    <h5></h5>
                    <div class="outs_more-buttn">
                    <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                <div class="slide__img "></div>
            </div>
            <div class="slide five-img">
                <div class="slider-up">
                    <h4>WeKam TV</h4>
                    <h5></h5>
                    <div class="outs_more-buttn">
                    <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                <div class="slide__img "></div>
            </div>
            <div class="slide six-img">
                <div class="slider-up">
                    <h4>WeKam TV</h4>
                    <h5></h5>
                    <div class="outs_more-buttn">
                    <a href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                <div class="slide__img "></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <ul class="pagination">
            <li><span class="pagination__item"> </span></li>
            <li><span class="pagination__item"> </span></li>
            <li><span class="pagination__item"> </span></li>
            <li><span class="pagination__item"> </span></li>
            <li><span class="pagination__item"> </span></li>
            <li><span class="pagination__item"> </span></li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <!--//banner-->
    <!--Footer -->
    <footer class="py-2">
        <div class="icons text-center py-md-3 pb-2">
            <ul>
                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                <li><a href="#"><span class="fas fa-envelope"></span></a></li>
                <li><a href="#"><span class="fas fa-rss"></span></a></li>
                <li><a href="#"><span class="fab fa-vk"></span></a></li>
            </ul>
        </div>
    </footer>
    <!-- //Footer -->
    <!-- js working-->
    <script src="{{asset('js/homepage/jquery-2.2.3.min.js') }}"></script>
    <!--//js working-->
    <!-- For-Banner -->
    <script src="{{asset('js/homepage/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/homepage/anime.min.js')}}"></script>
    <script src="{{asset('js/homepage/uncover.js')}}"></script>
    <script src="{{asset('js/homepage/demo1.js')}}"></script>
    <!-- //For-Banner -->
    <!--nav menu-->
    <script src="{{asset('js/homepage/classie.js')}}"></script>
    <script src="{{asset('js/homepage/demonav.js')}}"></script>
    <!-- //nav menu-->
    <!-- bootstrap working-->
    <script src="{{asset('js/homepage/bootstrap.min.js')}}"></script>
    <!-- // bootstrap working-->
</body>

</html>