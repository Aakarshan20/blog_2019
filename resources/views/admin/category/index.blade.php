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
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{session('success')}}
                </div>
                @endif

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>分類列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                           role="button" aria-expanded="false"><i class="fa fa-plus"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{URL::asset('admin/category/create')}}">新增分類</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link" href="/admin/category" onclick="reload()"><i class="fa fa-refresh"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>排序</th>
                          <th>ID</th>
                          <th>分類名稱</th>
                          <th>標題</th>
                          <th>查看次數</th>
                          <th>操作</th>
                        </tr>
                      </thead>
                      @if(isset($data))
                      @foreach($data as $v)
                      <tbody>
                        <tr>
                          <td>
                              <input type=text' name='cate_order' 
                                     onchange="changeOrder(this, {{$v->cate_id}})"
                                     value='{{$v->cate_order}}' size=2>
                          </td>
                          <td>{{$v->cate_id}}</td>
                          <td>{{$v->_cate_name}}</td>
                          <td>{{$v->cate_title}}</td>
                          <td>{{$v->cate_view}}</td>
                          <td><a href="{{url('/admin/category/'.$v->cate_id.'/edit')}}">修改</a>
                              <a href="javascript: delCate({{$v->cate_id}})">刪除</a>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                      @endif
                    </table>	
                  </div>
<!--                    <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item active">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                      </nav>-->
                </div>
              </div>
            </div>
          </div>
        </div>

<script type="text/javascript">
    //obj: input object, cate_id 分類的id
    function changeOrder(obj, cate_id){
        //post csrf field 
        //方法1: 把csrf token放到header>meta.attr('content')
        //再從裡面取出
        //$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        //post(url, 參數, callback(接收用的value){
        //
        //});
        var cate_order = $(obj).val();
        //方法2: 在ajax的data中直接傳入'_token': 'csrf_token()'
        $.post("{{url('admin/cate/changeorder')}}", 
                {'_token':'{{csrf_token()}}', 'cate_id':cate_id, 'cate_order': cate_order}, 
                function(data){
                        if(data.status==0){
                            layer.alert(data.msg, {icon: 6, btn:['確定']});
                        }else if(data.status == 1){
                            layer.alert(data.msg, {icon: 5, btn:['確定']});
                        }else{
                            layer.alert('未知錯誤...', {icon: 5, btn:['確定']});
                        }
                }
        );
    }
    
    //刪除分類
    function delCate(cate_id){
        
        layer.confirm('確認刪除此分類？', {
            btn: ['確定','取消'] //按钮
          }, function(){
            //layer.msg(cate_id, {icon: 1});
            $.post("{{url('admin/category/')}}/"+cate_id,{'_method':'delete', '_token':'{{csrf_token()}}'}, function(data){
                if(data.status == 0){
                    location.href=location.href;
                    layer.msg(data.msg, {
                        icon: 6,
                        time: 2000, //2s後自動關閉
                    });
                }else{
                    location.href=location.href;
                    layer.msg(data.msg, {
                        icon: 5,
                        time: 2000, //2s後自動關閉
                    });
                }
                
            });
            
          }, function(){
              
          });
        
//        if(confirm("確認刪除?")){
//            $.post("{{url('admin/category/')}}/"+cate_id,{'_method':'delete', '_token':'{{csrf_token()}}'}, function(data){
//                alert(data.msg);
//                if(data.status==0){    
//                    location.href=location.href;
//                }
//                
//            });
    }
    
    
    function reload(){
        layer.msg('載入中...', {
            icon: 16
            ,shade: 0.01
          });
    }
    
</script>
        <!-- /page content -->
<!-- /page content -->
@endsection