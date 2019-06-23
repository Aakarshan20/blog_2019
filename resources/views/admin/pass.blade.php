
@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>帳戶管理</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="row">
            
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="text-align:center">
                    <div class="x_title">
                        <h2>修改密碼</h2>
                        <div class="clearfix"></div>
                    </div>
                        <div class="x_content">
                            <form action = '{{url('admin/pass')}}' method = 'post'>
                                {{csrf_field()}}
                                
                                @if(count($errors)>0)
                                    <div class="alert alert-danger" role="alert">
                                    @if(is_object($errors))
                                        @foreach($errors->all() as $error)
                                                {{$error}}<br/>
                                        @endforeach
                                    @else
                                        {{$errors}}
                                    @endif
                                    </div>
                                @endif
                                
<!--                                <div class="item form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label" for="name">帳號</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputEmail3" name='username'
                                               placeholder="請輸入帳號" required='required'>
                                    </div>
                                </div>-->
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label" for="name2">舊密碼</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" class="form-control" id="inputPassword3" name='password_o'
                                               placeholder="請輸入舊密碼" required="required">
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">新密碼</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" class="form-control" id="inputPassword3" name='password'
                                               placeholder="請輸入新密碼6-20位" required="required">
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">確認新密碼</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="password" class="form-control" id="inputPassword3" 
                                               name='password_confirmation'
                                               placeholder="請確認新密碼6-20位" required="required">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <button id='send' type="submit" class="btn btn-primary">確認修改</button>
                                        <button id='send' type="submit" class="btn btn-light" 
                                                onclick="location.href='{{url('admin/index')}}'">返回</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection