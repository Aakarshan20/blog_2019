@extends('layouts.portal')
@section('content')
    <main class="mdl-layout__content">
        <div class="site-content">
            <div class="container">
                <div class="mdl-grid site-max-width">
                    @foreach($data as $datum)
                        <div class="mdl-cell mdl-card mdl-shadow--4dp portfolio-card">
                            <div class="mdl-card__media">
                                <img class="article-image" src="{{URL::asset($datum->art_thumb)}}" border="0" alt="">
                            </div>
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text">{{mb_substr($datum->art_title,0,16).'...'}}</h2>
                            </div>
                            <div class="mdl-card__supporting-text">
                                {{mb_substr( $datum->art_description,0,100,"utf-8").'...'}}
                            </div>
                            <br>
                            <div class="mdl-card__actions mdl-card--border">
                                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect mdl-button--accent"
                                   href="{{url('/article/' . $datum->art_id)}}">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    @endforeach
                        <div class="col-md-6 col-sm-6 col-xs-12" style="float:left;text-align: center;width:100%">
                            {{ $data->links()}}
                        </div>

                </div>


            </div>

        </div>

@endsection
