<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use \Validator;


class CategoryController extends CommonController
{
    //get admin/category 全部分類列表
    public function index(){
        $categories = (new Category)->tree();
        return view('admin.category.index')->with('data', $categories);
    }
    
    //get admin/category/create 新增分類(介面)
    public function create(){
        $data = Category::where('cate_pid', '0')->get();
        
        return view('admin.category.add', compact('data'));
    }
    
    //post admin/category 新增分類(提交)
    public function store(){
        $input = Input::except('_token');
         $rules = [
                'cate_name'=>'required|between:1,50',
                'cate_title'=>'required|between:1,100',
                'cate_order'=>'required|integer|between:1,127',
            ];
            
            $message = [
                'cate_name.required'=>'分類名稱不得為空',
                'cate_name.between'=>'分類名稱必須在1-50位之間',
                
                'cate_title.required'=>'分類標題不得為空',
                'cate_title.between'=>'分類標題必須在1-100位之間',
                
                'cate_order.required'=>'排序不得為空',
                'cate_order.integer'=>'排序須必須為1-127之間之整數',
                'cate_order.between'=>'排序須必須為1-127之間之整數',
            ];
            
            $validator = Validator::make($input, $rules, $message);
            if($validator->passes()){
                $re = Category::create($input);
                
                if($re){
                    return redirect('admin/category')->with(['success'=>'文章分類新增成功']);
                }else{
                    return view('admin.category.add')->with(['errors'=>'文章分類新增失敗']);
                }
            }else{
                return back()->withErrors($validator);
            }
    }
    
     //get admin/category/{category}/edit  更新單個分類(介面)
    public function edit($cate_id){
        if(!session('success')){
            session(['success'=>null]);
        }
        
        $field = Category::find($cate_id);
        $data = Category::where('cate_pid', 0)->get();
        if(!isset($field)){
            return back()->withErrors('ID號不存在');
        }else{
            return view('admin.category.edit', compact('field', 'data'));
        }
    }
    
    //put|patch admin/category/{category} 更新單個分類(提交)
    public function update($cate_id){
        $input = Input::except(['_token', '_method']);
        
        $category = Category::find($cate_id);
        
        if(!isset($category)){
            return back()->withErrors('更新失敗, 請稍後重試');
        }else{
            if($category->update($input)){
                return redirect('admin/category/')->with(['success'=>'文章分類更新成功']);
            }else{
                return back()->withErrors('分類訊息更新失敗, 請稍後重試');
            }   
        }
    }
    
    //delete admin/category/{category} 刪除單個分類
    public function destroy($cate_id){
        $category = Category::find($cate_id);
        if(!isset($category)){
            return ['status'=>1, 'msg'=>'分類ID錯誤刪除失敗, 請稍後重試'];
        }else{
            $re = $category->delete();
            
            if($re){
               Category::where('cate_pid', $cate_id)->update(['cate_pid'=>0]);
               return  ['status'=>0, 'msg'=>'分類刪除成功'];
            }else{
               return  ['status'=>1, 'msg'=>'分類刪除失敗, 請稍後重試'];
            }
        }
    }
    
    
    //get admin/category/{category} 顯示單個分類
    public function show(){
        
    }
   
    //更新排序
    public function changeOrder(){
        
        $input = Input::except('_token');
        
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
        
        if($re){
            $data = ['status'=>0, 'msg' => '分類排序更新成功'];
        }else{
            $data = ['status'=>1, 'msg' => '分類排序更新失敗, 請稍後重試'];
        }
        
        return  $data;
    }
}
