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
                <div class="x_panel">
                  <div class="x_title">
                    <h2>導航列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                           role="button" aria-expanded="false"><i class="fa fa-plus"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{URL::asset('admin/navs/create')}}">新增導航</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                          <th>導航名稱</th>
                          <th>導航別名</th>
                          <th>導航網址</th>
                          <th>操作</th>
                        </tr>
                      </thead>
                      @if(isset($data))
                      @foreach($data as $v)
                      <tbody>
                        <tr>
                          <td>
                              <input type=text' name='nav_order' 
                                     onchange="changeOrder(this, {{$v->nav_id}})"
                                     value='{{$v->nav_order}}' size=2>
                          </td>
                          <td>{{$v->nav_id}}</td>
                          <td>{{$v->nav_name}}</td>
                          <td>{{$v->nav_alias}}</td>
                          <td>{{$v->nav_url}}</td>
                          <td><a href="{{url('/admin/navs/'.$v->nav_id.'/edit')}}">修改</a>
                              <a href="javascript: delNavs({{$v->nav_id}})">刪除</a>
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
    //obj: input object, nav_id 導航的id
    function changeOrder(obj, nav_id){
        //post csrf field 
        //方法1: 把csrf token放到header>meta.attr('content')
        //再從裡面取出
        //$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        //post(url, 參數, callback(接收用的value){
        //
        //});
        
        var nav_order = $(obj).val();
        //方法2: 在ajax的data中直接傳入'_token': 'csrf_token()'
        $.post("{{url('admin/navs/changeorder')}}", 
                {'_token':'{{csrf_token()}}', 'nav_id':nav_id, 'nav_order': nav_order}, 
                function(data){
                        alert(data.msg);
        });
    }
    //刪除導航
    function delNavs(nav_id){
        if(confirm("確認刪除?")){
            $.post("{{url('admin/navs/')}}/"+nav_id,{'_method':'delete', '_token':'{{csrf_token()}}'}, function(data){
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