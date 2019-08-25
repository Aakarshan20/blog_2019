<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Nav;
use Illuminate\Support\Facades\Input;
use \Validator;



class NavsController extends CommonController
{
    //get admin/navs 全部導航列表
    public function index(){
        $data = Nav::orderBy('nav_order', 'asc')->paginate(15);
        return view('admin.navs.index', compact('data'));
    }

    //get admin/article/nav 新增導航(介面)
    public function create(){
        return view('admin.navs.add');
    }

    //post admin/nav 新增導航(提交)
    public function store(){
        $input = Input::except(['_token', '_method']);

        $rules = [
                'nav_name'=>'required|between:1,50',
                'nav_alias'=>'required|between:1,50',
                'nav_url'=>'required|between:1,255',
                'nav_order'=>'required|integer',
            ];

            $message = [

                'nav_name.required'=>'導航標題不得為空',
                'nav_name.between'=>'導航標題必須在1-50位之間',

                'nav_alias.required'=>'導航說明不得為空',
                'nav_alias.between'=>'導航說明必須在1-50位之間',

                'nav_url.required'=>'導航地址不得為空',
                'nav_url.between'=>'導航地址必須在1-100位之間',

                'nav_order.required'=>'導航排序不得為空',
                'nav_order.integer'=>'導航排序須為整數',
            ];

        $validator = Validator::make($input, $rules, $message);
            if($validator->passes()){
                $re = Nav::create($input);

                if($re){
                    return redirect('admin/navs')->with(['success'=>'導航新增成功']);
                }else{
                    return view('admin.navs.add')->with(['errors'=>'導航新增失敗']);
                }

            }else{
                return back()->withErrors($validator);
            }
    }

     //get admin/navs/{navs}/edit  更新單個導航(介面)
    public function edit($nav_id){
        if(!session('success')){
            session(['success'=>null]);
        }

        $field = Nav::find($nav_id);
        if(!isset($field)){
            return back()->withErrors('ID號不存在');
        }else{
            return view('admin.navs.edit', compact('field', $field));
        }
    }

    //put|patch admin/nav/{nav} 更新單個導航(提交)
    public function update($nav_id){
        $input = Input::except(['_token', '_method']);

        $rules = [
            'nav_name'=>'required|between:1,50',
            'nav_alias'=>'required|between:1,50',
            'nav_url'=>'required|between:1,255',
            'nav_order'=>'required|integer',
        ];

        $message = [

            'nav_name.required'=>'導航標題不得為空',
            'nav_name.between'=>'導航標題必須在1-50位之間',

            'nav_alias.required'=>'導航說明不得為空',
            'nav_alias.between'=>'導航說明必須在1-50位之間',

            'nav_url.required'=>'導航地址不得為空',
            'nav_url.between'=>'導航地址必須在1-100位之間',

            'nav_order.required'=>'導航排序不得為空',
            'nav_order.integer'=>'導航排序須為整數',
        ];

        $validator = Validator::make($input, $rules, $message);
        if($validator->passes()){
            $nav = Nav::find($nav_id);

            if(!isset($nav)){
                return back()->withErrors('更新失敗, 請稍後重試');
            }else{
                if($nav->update($input)){
                    return redirect('admin/navs')->with(['success'=>'導航更新成功']);
                }else{
                    return back()->withErrors('導航訊息更新失敗, 請稍後重試');
                }
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete admin/nav/{nav} 刪除單個導航
    public function destroy($nav_id){
        $nav = Nav::find($nav_id);
        if(!isset($nav)){
            return ['status'=>1, 'msg'=>'導航ID錯誤刪除失敗, 請稍後重試'];
        }else{
            $re = $nav->delete();

            if($re){
               return  ['status'=>0, 'msg'=>'導航刪除成功'];
            }else{
               return  ['status'=>1, 'msg'=>'導航刪除失敗, 請稍後重試'];
            }
        }
    }


    //get admin/nav/{nav} 顯示單個導航
    public function show(){

    }

    //更新排序
    public function changeOrder(){

        $input = Input::except('_token');
        $nav = Nav::find($input['nav_id']);
        $nav->nav_order = $input['nav_order'];
        $re = $nav->update();

        if($re){
            $data = ['status'=>0, 'msg' => '導航排序更新成功'];
        }else{
            $data = ['status'=>1, 'msg' => '導航排序更新失敗, 請稍後重試'];
        }

        return  $data;
    }
}
