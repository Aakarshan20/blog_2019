
@extends('layouts.admin')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>配置項管理</h3>
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
                        <h2>新增配置項</h2>
                        <div class="clearfix"></div>
                    </div>
                        <div class="x_content">
                            <form action = '{{url('admin/config')}}' method = 'post' name="myForm">
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
                                           for="name2">* 標題</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='conf_title'
                                               placeholder="請輸入配置項標題" >
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label" 
                                           for="name2">* 名稱</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='conf_name'
                                               placeholder="請輸入配置項名稱" >
                                    </div>
                                </div>                          
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">* 字段類型</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12" style="text-align:left">
                                        
                                      <input type="radio"  name="field_type" id="typeInput" value="input"
                                             checked=""
                                             onclick="showFieldValue()"
                                             required /> 
                                      input　　
                                      <input type="radio"  name="field_type" id="typeTextarea" value="textarea" 
                                             onclick="showFieldValue()" />
                                      textarea　　
                                      <input type="radio"  name="field_type" id="typeRadio" value="radio" 
                                             onclick="showFieldValue()" />
                                      radio　 
                                    </div>
                                </div>
                                <div class="item form-group row field_value" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"> 類型值</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='field_value'
                                               placeholder="只有類型為radio時才要配置,  格式: 1|開啟, 0|關閉" >
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"> 排序</label>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <input type="text" class="form-control" id="inputPassword3" name='conf_order'
                                               value="0"
                                               placeholder="請輸入排序" >
                                    </div>
                                </div>
                                <div class="item form-group row" style="text-align:right">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label"> 說明</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">                                        
                                        <textarea class="resizable_textarea form-control" name="conf_tips"
                                              placeholder="請輸入說明"></textarea>
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

<script>
    showFieldValue();
    function showFieldValue(){
        var type = $('input[name=field_type]:checked').val();
        if(type=='radio'){
            $('.field_value').show();
        }else{
            $('.field_value').hide();
        }
    }
</script>
<!-- /page content -->
@endsection