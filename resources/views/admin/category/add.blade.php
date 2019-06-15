
@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>文章管理</h3>
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
                        <h2>新增文章分類</h2>
                        <div class="clearfix"></div>
                    </div>
                        <div class="x_content">
                            <form action = '{{url('admin/category')}}' method = 'post'>
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
                                    <label class="col-sm-2 col-form-label">父級分類</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" name="cate_pid">
                                            <option value="0">==頂級分類==</option>
                                            @if(isset($data))
                                                @foreach($data as $v)
                                                    <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label" 
                                           for="name2">* 分類名稱</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='cate_name'
                                               placeholder="請輸入分類名稱" >
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">* 分類標題</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='cate_title'
                                               placeholder="請輸入分類標題" >
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">關鍵字</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='cate_keyword'
                                               placeholder="請輸入關鍵字" >
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="control-label col-sm-2 col-form-label">描述</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea class="resizable_textarea form-control" name="cate_description"
                                                  placeholder="請輸入分類描述"></textarea>
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">* 排序</label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='cate_order'
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