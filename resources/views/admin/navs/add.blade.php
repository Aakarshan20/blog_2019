
@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>自定義導航管理</h3>
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
                        <h2>新增導航</h2>
                        <div class="clearfix"></div>
                    </div>
                        <div class="x_content">
                            <form action = '{{url('admin/navs')}}' method = 'post'>
                                {{csrf_field()}}
                                
                                @if(count($errors)>0)
                                    <div class="alert alert-danger" role="alert">
                                    @if(is_object($errors))
                                        @foreach($errors->all() as $error)
                                                {{"【" . $error . "】"}}<br/>
                                        @endforeach
                                    @else
                                        {{"【" . $errors . "】"}}<br/>
                                    @endif
                                    </div>
                                @endif
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label" 
                                           for="name2">* 導航名稱</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='nav_name'
                                               placeholder="請輸入導航名稱" >
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">* 導航別名</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='nav_alias'
                                               placeholder="請輸入導航別名" >
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">* 導航網址</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='nav_url'
                                               placeholder="請輸入導航網址" >
                                    </div>
                                </div>
                                
      
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"> 排序</label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='nav_order'
                                               value="0"
                                               placeholder="請輸入排序" >
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-sm-5">
                                        <button id='send' type="submit" class="btn btn-primary">確認新增</button>
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
<style>
.btn-primary:hover {

    color: #fff;
    background-color: #35495d;
    border-color: #204d74;

}

.btn-primary {
    color: #fff;
    background-color: #2f4356;
    border-color: #204d74;

}
</style>
<!-- /page content -->
@endsection