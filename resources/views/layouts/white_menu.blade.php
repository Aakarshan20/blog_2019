<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--========== The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags ==========-->
    <title>Chivalric</title>

    <!--==========Dependency============-->
    <link rel="stylesheet" href="{{URL::asset('home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('home/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('home/vendors/owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{URL::asset('home/vendors/magnific-popup/magnific-popup.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:500">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans:600,700italic">
    <link href='https://fonts.googleapis.com/css?family=Dosis:400,200,300,500,600,800,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:400,300,300italic,400italic">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500italic,500,700italic,700,900,900italic' rel='stylesheet' type='text/css'>

    <!--==========Theme Styles==========-->
    <link href="{{URL::asset('home/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('home/css/theme/green.css')}}" rel="stylesheet">

    <!--========== HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries ==========-->
    <!--========== WARNING: Respond.js doesn't work if you view the page via file:// ==========-->
    <!--==========[if lt IE 9]>
    <script src="{{URL::asset('home/js/html5shiv.min.js')}}"></script>
    <script src="{{URL::asset('home/js/respond.min.js')}}"></script>
    <![endif]==========-->
</head>
<body class="home">

<header class="row transparent white" data-spy="affix" data-offset-top="300" id="header">
    <div class="container">
        <div class="row top-header">
            <div class="col-sm-4 search-form-col">
                <form action="#" method="get" class="search-form">
                    <div class="input-group">
                        <span class="input-group-addon"><img src="{{URL::asset('home/images/search-icon-dark.png')}}" alt=""></span>
                        <input type="search" class="form-control" placeholder="search">
                    </div>
                </form>
            </div>
            <div class="col-sm-4 logo-col text-center">
                <a href="index6.html"><img src="{{URL::asset('home/images/logo-black-green.png')}}" alt=""></a>
            </div>
            <div class="col-sm-4 menu-trigger-col">
                <button class="menu-trigger black pull-right">
                    <span class="active-page">Blog Details</span>
                    <img src="{{URL::asset('home/images/menu-align-dark.png')}}" alt="" class="icon-burger">
                    <img src="{{URL::asset('home/images/menu-close-dark.png')}}" alt="" class="icon-cross">
                </button>
            </div>
        </div>
    </div>
    <div class="row menu-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 menu-col">
                    <div class="row">
                        <ul class="nav column-menu white-bg">
                            <li class="active dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('/')}}">Home Option 1</a></li>
                                    <li><a href="{{url('/')}}">Home Option 2</a></li>
                                    <li><a href="{{url('/')}}">Home Option 3</a></li>
                                    <li><a href="{{url('/')}}">Home Option 4</a></li>
                                    <li><a href="{{url('/')}}">Home Option 5</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('about')}}">About</a></li>
                            <li><a href="{{url('article')}}">Blog Single 1</a></li>
                            <li><a href="{{url('article2')}}">Blog Single 2</a></li>
                        </ul>
                        <ul class="nav column-menu white-bg">
                            <li><a href="{{url('article3')}}">Blog Single 3</a></li>

                            <li><a href="{{url('contact')}}">contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 subscribe-col">
                    <h5 class="widget-title">subscribe to our newsletter.</h5>
                    <form action="#" method="post" class="form-inline subscribe-form">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm"><span>send</span></button>
                    </form>
                    <ul class="nav social-nav white">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

@yield('content')

<!--Footer-->
<footer class="row" id="footer">
    <div class="container">
        <div class="row top-footer">
            <div class="widget col-sm-3 widget-about">
                <div class="row m0"><a href="{{url('/')}}"><img src="{{URL::asset('home/images/logo-black-green.png')}}" alt=""></a></div>
            </div>
            <div class="widget col-sm-5 widget-menu">
                <div class="row">
                    <ul class="nav column-menu white-bg">
                        <li class="active"><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('about')}}">About</a></li>
                        <li><a href="{{url('article')}}">Blog Single 1</a></li>
                        <li><a href="{{url('article2')}}">Blog Single 2</a></li>
                    </ul>
                    <ul class="nav column-menu white-bg">
                        <li><a href="{{url('article3')}}">Blog Single 3</a></li>

                        <li><a href="{{url('contact')}}">contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="widget col-sm-4 widget-subscribe">
                <h5 class="widget-title">subscribe to our newsletter.</h5>
                <form action="#" method="post" class="form-inline subscribe-form">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm"><span>send</span></button>
                </form>
            </div>
        </div>
        <h5 class="copyright">Copyright &copy; 2017.Company name All rights reserved.More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></h5>
    </div>
</footer>

<!--========== jQuery (necessary for Bootstrap's JavaScript plugins) ==========-->
<script src="{{URL::asset('home/js/jquery-2.2.0.min.js')}}"></script>
<script src="{{URL::asset('home/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('home/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{URL::asset('home/vendors/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{URL::asset('home/vendors/instafeed/instafeed.min.js')}}"></script>
<script src="{{URL::asset('home/vendors/imagesLoaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{URL::asset('home/vendors/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{URL::asset('home/js/theme.js')}}"></script>
</body>
</html>
