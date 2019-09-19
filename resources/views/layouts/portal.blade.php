<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portfolio Page</title>
    <meta name="description" content="Your portfolio page description"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;amp;lang=en" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css" rel="stylesheet">
    <link href="{{URL::asset('portal/styles/main.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body id="top">
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header"><a href="{{url('/contact')}}" id="contact-button" class="mdl-button mdl-button--fab mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast mdl-shadow--4dp"><i class="material-icons">mail</i></a>
    <header class="mdl-layout__header mdl-layout__header--waterfall site-header">
        <div class="mdl-layout__header-row site-logo-row"><span class="mdl-layout__title">
            <div class="site-logo"></div><span class="site-description">Material Design Portfolio</span></span></div>
        <div class="mdl-layout__header-row site-navigation-row mdl-layout--large-screen-only">
            <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font"><a class="mdl-navigation__link" href="{{url('/')}}">首頁</a><a class="mdl-navigation__link" href="{{url('/article')}}">文章列表</a><a class="mdl-navigation__link" href="{{url('/about')}}">關於我們</a><a class="mdl-navigation__link" href="{{url('/contact')}}">聯絡我們</a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer mdl-layout--small-screen-only">
        <nav class="mdl-navigation mdl-typography--body-1-force-preferred-font"><a class="mdl-navigation__link" href="{{url('/')}}">首頁</a><a class="mdl-navigation__link" href="{{url('/article')}}">文章列表</a><a class="mdl-navigation__link" href="{{url('/about')}}">關於我們</a><a class="mdl-navigation__link" href="{{url('/contact')}}">聯絡我們</a>
        </nav>
    </div>
    @yield('content')
    <footer class="mdl-mini-footer">
        <div class="footer-container">
            <div class="mdl-logo">&copy; Unitiled. More Templates <a href="http://www.cssmoban.com/" target="_blank"
                                                                     title="模板之家">模板之家</a> - Collect from <a
                    href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></div>
            <ul class="mdl-mini-footer__link-list">
                <li><a href="#">Privacy & Terms</a></li>
            </ul>
        </div>
    </footer>
    </main>
    <script src="https://code.getmdl.io/1.3.0/material.min.js" defer></script>
</div>
</body>
</html>

