@extends('layouts.admin')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>友情鏈接管理</h3>
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
                    <h2>鏈接列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           role="button" aria-expanded="false"><i class="fa fa-plus"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{URL::asset('admin/links/create')}}">新增鏈接</a>
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
                          <th>鏈接名稱</th>
                          <th>鏈接標題</th>
                          <th>鏈接網址</th>
                          <th>操作</th>
                        </tr>
                      </thead>
                      @if(isset($data))
                      @foreach($data as $v)
                      <tbody>
                        <tr>
                          <td>
                              <input type=text' name='link_order'
                                     onchange="changeOrder(this, {{$v->link_id}})"
                                     value='{{$v->link_order}}' size=2>
                          </td>
                          <td>{{$v->link_id}}</td>
                          <td>{{$v->link_name}}</td>
                          <td>{{$v->link_title}}</td>
                          <td>{{$v->link_url}}</td>
                          <td><a href="{{url('/admin/links/'.$v->link_id.'/edit')}}">修改</a>
                              <a href="javascript: delLinks({{$v->link_id}})">刪除</a>
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                      @endif
                    </table>
                      <div class="col-md-6 col-sm-6 col-xs-12" style="float:right;text-align: right">
                          {{ $data->links()}}
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<script type="text/javascript">
    //obj: input object, link_id 鏈接的id
    function changeOrder(obj, link_id){
        //post csrf field
        //方法1: 把csrf token放到header>meta.attr('content')
        //再從裡面取出
        //$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        //post(url, 參數, callback(接收用的value){
        //
        //});

        var link_order = $(obj).val();
        //方法2: 在ajax的data中直接傳入'_token': 'csrf_token()'
        $.post("{{url('admin/links/changeorder')}}",
                {'_token':'{{csrf_token()}}', 'link_id':link_id, 'link_order': link_order},
                function(data){
                        alert(data.msg);
        });
    }
    //刪除鏈接
    function delLinks(link_id){
        if(confirm("確認刪除?")){
            $.post("{{url('admin/links/')}}/"+link_id,{'_method':'delete', '_token':'{{csrf_token()}}'}, function(data){
                alert(data.msg);
                if(data.status==0){
                    location.href=location.href;
                }
            });
        }
    }

</script>
<style>
    .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover,
    .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover {
        z-index: 3;
        color: #fff;
        cursor: default;
        background-color: #2a3f54;
        border-color: #55697b;
    }
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
<!-- /page content -->
@endsection
