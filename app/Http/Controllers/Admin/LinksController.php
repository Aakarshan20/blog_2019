<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Link;
use Illuminate\Support\Facades\Input;
use \Validator;



class LinksController extends CommonController
{
    //get admin/links 全部連接列表
    public function index(){
        $data = Link::orderBy('link_order', 'asc')->paginate(3);
        return view('admin.links.index', compact('data'));
    }

    //get admin/article/link 新增文章(介面)
    public function create(){
        return view('admin.links.add');
    }

    //post admin/link 新增文章(提交)
    public function store(){
        $input = Input::except(['_token', '_method']);
        $rules = [

                'link_title'=>'required|between:1,100',
                'link_name'=>'required|between:1,100',
                'link_url'=>'required|between:1,100',
                'link_order'=>'required',
            ];

            $message = [
                'link_title.required'=>'鏈接標題不得為空',
                'link_title.between'=>'鏈接標題必須在1-100位之間',

                'link_name.required'=>'鏈接標題不得為空',
                'link_name.between'=>'鏈接標題必須在1-100位之間',

                'link_url.required'=>'鏈接地址不得為空',
                'link_url.between'=>'鏈接地址必須在1-100位之間',

                'link_order.required'=>'鏈接排序不得為空',
            ];

        $validator = Validator::make($input, $rules, $message);
            if($validator->passes()){
                $re = Link::create($input);

                if($re){
                    return redirect('admin/links')->with(['success'=>'文章文章新增成功']);
                }else{
                    return view('admin.links.add')->with(['errors'=>'文章文章新增失敗']);
                }
            }else{
                return back()->withErrors($validator);
            }
    }

     //get admin/links/{links}/edit  更新單個文章(介面)
    public function edit($link_id){
        if(!session('success')){
            session(['success'=>null]);
        }

        $field = Link::find($link_id);
        if(!isset($field)){
            return back()->withErrors('ID號不存在');
        }else{
            return view('admin.links.edit', compact('field', $field));
        }
    }

    //put|patch admin/link/{link} 更新單個文章(提交)
    public function update($link_id){
        $input = Input::except(['_token', '_method']);

        $rules = [

                'link_title'=>'required|between:1,100',
                'link_name'=>'required|between:1,100',
                'link_url'=>'required|between:1,100',
                'link_order'=>'required',
            ];

            $message = [
                'link_title.required'=>'鏈接標題不得為空',
                'link_title.between'=>'鏈接標題必須在1-100位之間',

                'link_name.required'=>'鏈接標題不得為空',
                'link_name.between'=>'鏈接標題必須在1-100位之間',

                'link_url.required'=>'鏈接地址不得為空',
                'link_url.between'=>'鏈接地址必須在1-100位之間',

                'link_order.required'=>'鏈接排序不得為空',
            ];

        $validator = Validator::make($input, $rules, $message);
        if($validator->passes()){
            $link = Link::find($link_id);

            if(!isset($link)){
                return back()->withErrors('更新失敗, 請稍後重試');
            }else{
                if($link->update($input)){
                    return redirect('admin/links')->with(['success'=>'鏈接更新成功']);
                }else{
                    return back()->withErrors('鏈接訊息更新失敗, 請稍後重試');
                }
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete admin/link/{link} 刪除單個鏈接
    public function destroy($link_id){
        $link = Link::find($link_id);
        if(!isset($link)){
            return ['status'=>1, 'msg'=>'鏈接ID錯誤刪除失敗, 請稍後重試'];
        }else{
            $re = $link->delete();

            if($re){
               return  ['status'=>0, 'msg'=>'鏈接刪除成功'];
            }else{
               return  ['status'=>1, 'msg'=>'鏈接刪除失敗, 請稍後重試'];
            }
        }
    }


    //get admin/link/{link} 顯示單個鏈接
    public function show(){

    }

    //更新排序
    public function changeOrder(){

        $input = Input::except('_token');
        $link = Link::find($input['link_id']);
        $link->link_order = $input['link_order'];
        $re = $link->update();

        if($re){
            $data = ['status'=>0, 'msg' => '鏈接排序更新成功'];
        }else{
            $data = ['status'=>1, 'msg' => '鏈接排序更新失敗, 請稍後重試'];
        }

        return  $data;
    }
}
