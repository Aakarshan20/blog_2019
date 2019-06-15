
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
                        <h2>編輯文章</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action = '{{url('admin/article/'.$field->art_id)}}' method = 'post'>
                            <input type="hidden" name="_method" value="put">
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
                                <label class="col-sm-2 col-form-label">分類</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="cate_id">
                                        @if(isset($data))
                                            @foreach($data as $v)
                                            <option value="{{$v->cate_id}}"
                                                    @if($field->cate_id == $v->cate_id) selected @endif
                                            >{{$v->_cate_name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group row" style="text-align:right">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">* 文章標題</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" id="inputPassword3" name='art_title'
                                           value="{{$field->art_title}}"
                                           placeholder="請輸入文章標題" >
                                </div>
                            </div>
                            <div class="item form-group row" style="text-align:right">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">* 作者</label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <input type="text" class="form-control" id="inputPassword3" name='art_editor'
                                           value="{{$field->art_editor}}"
                                           placeholder="請輸入作者" >
                                </div>
                            </div>
                            <div class="item form-group row" style="text-align:right">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"> 縮圖</label>
                                <!--<div class="col-md-4 col-sm-4 col-xs-12">-->
                                    
                                    <link rel="stylesheet" type="text/css" href="{{asset('resources/org/Huploadify/Huploadify.css')}}"/>
                                    <script type="text/javascript" src="{{asset('resources/org/Huploadify/jquery.Huploadify.js')}}"></script>
                                    <script type="text/javascript">
                                    $(function () {
                                        $('#upload').Huploadify({
                                            auto: true,
                                            fileTypeExts: '*.jpg;*.JPG;*.png;*.PNG;*.exe',
                                            multi: true,
                                            formData: {key: 123456, key2: 'vvvv', _token: '{{csrf_token()}}'},
                                            fileSizeLimit: 9999,
                                            showUploadedPercent: true, //是否实时显示上传的百分比，如20%
                                            showUploadedSize: true,
                                            removeTimeout: 9999999,
                                            //uploader: "{{asset('resources/org/Huploadify/upload.php')}}",
                                            uploader: "{{url('admin/upload')}}",
                                            onUploadStart: function () {
//                                                alert('開始上傳');
                                            },
                                            onInit: function () {
//                                                alert('初始化');
                                            },

                                            onUploadComplete: function (file, data, response) {
                                                $('input[name=art_thumb]').val(data);
                                                $('#art_thumb_img').attr('src', '/' +data);
                                            },

                                            
                                            onDelete: function (file) {
                                                console.log('删除的文件：' + file);
                                                console.log(file);
                                            }
                                        });
                                    });
                                    </script>
                                <!--</div>-->
                                
                                <div class="col-md-2 col-sm-2 col-xs-12" id="upload" 
                                    style="text-align:left;margin: 0px;">
                                </div>

                            </div>
                            <div class="item form-group row" style="text-align:right">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">縮圖檔名</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" id="thumbName" name='art_thumb'
                                           value="{{$field->art_thumb}}"
                                           readonly="readonly" placeholder="請選擇上傳圖片" >
                                </div>
                            </div>
                            <div class="item form-group row" style="text-align:right">
                                <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                    <img src="{{url('/' . $field->art_thumb)}}" alt="無縮圖"  id="art_thumb_img" name='art_editor' 
                                         style="max-height: 350px; max-width: 350px">
                                </div>
                            </div>
                            <div class="item form-group row" style="text-align:right">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">關鍵字</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" id="inputPassword3" name='art_tag'
                                           value="{{$field->art_tag}}"
                                           placeholder="請輸入關鍵字" >
                                </div>
                            </div>
                            
                            <div class="item form-group row" style="text-align:right">
                                <label for="inputPassword3" class="control-label col-sm-2 col-form-label">描述</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="resizable_textarea form-control" name="art_description"
                                              placeholder="請輸入分類描述">{{$field->art_description}}</textarea>
                                </div>
                            </div>

                            <div class="item form-group row" style="text-align:right">

                                <label for="inputPassword3" class="control-label col-sm-2 col-form-label">* 文章內容</label>
                                <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.config.js')}}"></script>
                                <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/ueditor.all.min.js')}}"></script>
                                <script type="text/javascript" charset="utf-8" src="{{asset('resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <script id="editor" name="art_content" type="text/plain" style ='height:500px;' >
                                        {!! $field->art_content !!}
                                    </script>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-5">
                                    <button id='send' type="submit" class="btn btn-primary">確認修改</button>
                                    <button  class="btn btn-light" ><a href = "{{url('admin/index')}}">返回</a></button>
                                </div>
                            </div>
                        </form>

                        <script type="text/javascript">

//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
var ue = UE.getEditor('editor');


function isFocus(e) {
    alert(UE.getEditor('editor').isFocus());
    UE.dom.domUtils.preventDefault(e)
}
function setblur(e) {
    UE.getEditor('editor').blur();
    UE.dom.domUtils.preventDefault(e)
}
function insertHtml() {
    var value = prompt('插入html代码', '');
    UE.getEditor('editor').execCommand('insertHtml', value)
}
function createEditor() {
    enableBtn();
    UE.getEditor('editor');
}
function getAllHtml() {
    alert(UE.getEditor('editor').getAllHtml())
}
function getContent() {
    var arr = [];
    arr.push("使用editor.getContent()方法可以获得编辑器的内容");
    arr.push("内容为：");
    arr.push(UE.getEditor('editor').getContent());
    alert(arr.join("\n"));
}
function getPlainTxt() {
    var arr = [];
    arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
    arr.push("内容为：");
    arr.push(UE.getEditor('editor').getPlainTxt());
    alert(arr.join('\n'))
}
function setContent(isAppendTo) {
    var arr = [];
    arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
    UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
    alert(arr.join("\n"));
}
function setDisabled() {
    UE.getEditor('editor').setDisabled('fullscreen');
    disableBtn("enable");
}

function setEnabled() {
    UE.getEditor('editor').setEnabled();
    enableBtn();
}

function getText() {
    //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
    var range = UE.getEditor('editor').selection.getRange();
    range.select();
    var txt = UE.getEditor('editor').selection.getText();
    alert(txt)
}

function getContentTxt() {
    var arr = [];
    arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
    arr.push("编辑器的纯文本内容为：");
    arr.push(UE.getEditor('editor').getContentTxt());
    alert(arr.join("\n"));
}
function hasContent() {
    var arr = [];
    arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
    arr.push("判断结果为：");
    arr.push(UE.getEditor('editor').hasContents());
    alert(arr.join("\n"));
}
function setFocus() {
    UE.getEditor('editor').focus();
}
function deleteEditor() {
    disableBtn();
    UE.getEditor('editor').destroy();
}
function disableBtn(str) {
    var div = document.getElementById('btns');
    var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
    for (var i = 0, btn; btn = btns[i++]; ) {
        if (btn.id == str) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        } else {
            btn.setAttribute("disabled", "true");
        }
    }
}
function enableBtn() {
    var div = document.getElementById('btns');
    var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
    for (var i = 0, btn; btn = btns[i++]; ) {
        UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
    }
}

function getLocalData() {
    alert(UE.getEditor('editor').execCommand("getlocaldata"));
}

function clearLocalData() {
    UE.getEditor('editor').execCommand("clearlocaldata");
    alert("已清空草稿箱")
}
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection