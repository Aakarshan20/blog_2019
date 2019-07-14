@extends('layouts.admin')
@section('content')
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
                <div class="x_panel">
                  <div class="x_title">
                    <h2>文章列表</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-plus"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{url('/admin/article/create')}}">新增文章</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <table id="" class="table table-striped bulk_action">
                      <thead>
                        <tr>
                          <th></th>
                          <th>ID</th>
                          <th>標題</th>
                          <th style="white-space:nowrap;">點擊</th>
                          <th>編輯</th>
                          <th>發布時間</th>
                          <th>操作</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($data as $v)
                        <tr>
                          <td></td>
                          <td>{{$v->art_id}}</td>
                          <td>
                              <a href="#">{{$v->art_title}}</a>
                          </td>
                          <td>{{$v->art_view}}</td>
                          <td>{{$v->art_editor}}</td>
                          <td>{{$v->art_time}}</td>
                          <!--<td>-->
                              <!-- <button class="btn btn-xs btn-dark" id="btn_3" -->
                                <!--onclick="location.href='{{url('/admin/article/' . $v->art_id . '/edit')}}'">編輯</button>-->
                              <!-- <button class="btn btn-xs btn-danger" id="btn_3" -->
                                <!--onclick="location.href='{{url('/admin/article/' . $v->art_id . '/edit')}}'">刪除</button>-->
                          <!--</td>-->
                          <td><a href="{{url('/admin/article/'.$v->art_id.'/edit')}}">修改</a>
                              <a href="javascript: delArt({{$v->art_id}})">刪除</a>
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                      
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
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by Colorlib. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Datatables -->
    <script src="{{ URL::asset('public/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('public/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
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
    
    <script>
    //刪除文章
    function delArt(art_id){
        if(confirm("確認刪除?")){
            $.post("{{url('admin/article/')}}/"+art_id,{'_method':'delete', '_token':'{{csrf_token()}}'}, function(data){
                alert(data.msg);
                if(data.status==0){    
                    location.href=location.href;
                }  
            });
        }
    }
    </script>

@endsection

