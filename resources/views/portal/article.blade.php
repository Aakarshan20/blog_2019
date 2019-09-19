@extends('layouts.portal')
@section('content')
    <main class="mdl-layout__content">
        <div class="site-content">
            <div class="mdl-grid site-max-width">
                <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp page-content">
                    <div class="mdl-card__title">
                        <h1 class="mdl-card__title-text">{{$article->cate_name}} / {{$article->art_title}}</h1>
                    </div>
                    <div class="mdl-card__media"><img class="article-image" src="{{URL::asset($article->art_thumb)}}"
                                                      border="0" alt="Portfolio Page">
                    </div>
                    <div class="mdl-grid site-copy">
                        <div class="mdl-cell mdl-cell--12-col"><p>
                            <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">{{$article->art_description}}</h3></p>
                            <div class="mdl-cell mdl-cell--10-col mdl-card__supporting-text no-padding ">
                                {!! $article->art_content !!}
                            </div>


                            <div class="mdl-grid">
                                <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">文章資訊</h3>
                                <div class="mdl-cell mdl-cell--6-col mdl-card__supporting-text no-padding ">
                                    <p>
                                        作者: {{$article->art_editor}}
                                    </p>
                                    <p>
                                        發布時間: {{$article->art_time}}
                                    </p>
                                    <p>
                                        點擊量: {{$article->art_view}}
                                    </p>

                                </div>
                                <div class="mdl-cell mdl-cell--6-col">
                                    <img class="article-image" src="{{url::asset('portal/img/portfolio4.jpg')}}" border="0" alt="">
                                </div>
                            </div>

                            <div class="mdl-grid">
                                <h3 class="mdl-cell mdl-cell--12-col mdl-typography--headline">標籤</h3>
                                <div class="mdl-cell mdl-cell--9-col mdl-card__supporting-text no-padding ">
                                    <p>
                                        {{$article->art_tag}}
                                    </p>
                                </div>
                                <div class="mdl-cell mdl-cell--3-col mdl-card__supporting-text no-padding ">
                                    <a class="mdl-button mdl-button--raised mdl-js-button mdl-js-ripple-effect mdl-button--accent"
                                       href="#">View<span class="mdl-button__ripple-container"><span
                                                class="mdl-ripple"></span></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
