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
                <div class="x_panel">
                  <div class="x_title">
                    <h2>配置項列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                           role="button" aria-expanded="false"><i class="fa fa-plus"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{URL::asset('admin/config/create')}}">新增配置項</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" 
                           cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th style="width:5%">排序</th>
                          <th style="width:5%">ID</th>
                          <th>標題</th>
                          <th>名稱</th>
                          <th>地址</th>
                          <th style="width:15%">操作</th>
                        </tr>
                      </thead>
                      @if(isset($data))
                      @foreach($data as $v)
                      <tbody>
                        <tr>
                          <td>
                              <input type=text' name='conf_order' 
                                     onchange="changeOrder(this, {{$v->conf_id}})"
                                     value='{{$v->conf_order}}' size=2>
                          </td>
                          <td>{{$v->conf_id}}</td>
                          <td>{{$v->conf_title}}</td>
                          <td>{{$v->conf_name}}</td>
                          <td></td>
                          <td><a href="{{url('/admin/config/'.$v->conf_id.'/edit')}}">修改</a>
                              <a href="javascript: delConfig({{$v->conf_id}})">刪除</a>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                      @endif
                    </table>	
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<script type="text/javascript">
    //obj: input object, conf_id 配置項的id
    function changeOrder(obj, conf_id){
        //post csrf field 
        //方法1: 把csrf token放到header>meta.attr('content')
        //再從裡面取出
        //$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        //post(url, 參數, callback(接收用的value){
        //
        //});
        
        var conf_order = $(obj).val();
        //方法2: 在ajax的data中直接傳入'_token': 'csrf_token()'
        $.post("{{url('admin/config/changeorder')}}", 
                {'_token':'{{csrf_token()}}', 'conf_id':conf_id, 'conf_order': conf_order}, 
                function(data){
                        alert(data.msg);
        });
    }
    //刪除配置項
    function delConfig(conf_id){
        if(confirm("確認刪除?")){
            $.post("{{url('admin/config/')}}/"+conf_id,{'_method':'delete', '_token':'{{csrf_token()}}'}, function(data){
                alert(data.msg);
                if(data.status==0){    
                    location.href=location.href;
                }
            });
        }
    }
    
</script>
        <!-- /page content -->
<!-- /page content -->
@endsection