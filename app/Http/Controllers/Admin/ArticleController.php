<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use \Validator;


class ArticleController extends CommonController
{
    //get admin/article 全部文章列表
    public function index(){
        echo "111";
    }
    
    //get admin/article/create 新增文章(介面)
    public function create(){
        $data = Category::all();
        return view('admin.article.add', compact(['data']));
    }
    
    //post admin/article 新增文章(提交)
    public function store(){
        $input = Input::except('_token');
         $rules = [
                'cate_name'=>'required|between:1,50',
                'cate_title'=>'required|between:1,100',
                'cate_order'=>'required|integer|between:1,127',
            ];
            
            $message = [
                'cate_name.required'=>'文章名稱不得為空',
                'cate_name.between'=>'文章名稱必須在1-50位之間',
                
                'cate_title.required'=>'文章標題不得為空',
                'cate_title.between'=>'文章標題必須在1-100位之間',
                
                'cate_order.required'=>'排序不得為空',
                'cate_order.integer'=>'排序須必須為1-127之間之整數',
                'cate_order.between'=>'排序須必須為1-127之間之整數',
            ];
            
            $validator = Validator::make($input, $rules, $message);
            if($validator->passes()){
                $re = Category::create($input);
                
                if($re){
                    return redirect('admin/article')->with(['success'=>'文章文章新增成功']);
                }else{
                    return view('admin.category.add')->with(['errors'=>'文章文章新增失敗']);
                }
            }else{
                return back()->withErrors($validator);
            }
    }
    
     //get admin/article/{category}/edit  更新單個文章(介面)
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
    
    //put|patch admin/article/{category} 更新單個文章(提交)
    public function update($cate_id){
        $input = Input::except(['_token', '_method']);
        
        $category = Category::find($cate_id);
        
        if(!isset($category)){
            return back()->withErrors('更新失敗, 請稍後重試');
        }else{
            if($category->update($input)){
                return redirect('admin/article/')->with(['success'=>'文章文章更新成功']);
            }else{
                return back()->withErrors('文章訊息更新失敗, 請稍後重試');
            }   
        }
    }
    
    //delete admin/article/{category} 刪除單個文章
    public function destroy($cate_id){
        $category = Category::find($cate_id);
        if(!isset($category)){
            return ['status'=>1, 'msg'=>'文章ID錯誤刪除失敗, 請稍後重試'];
        }else{
            $re = $category->delete();
            
            if($re){
               Category::where('cate_pid', $cate_id)->update(['cate_pid'=>0]);
               return  ['status'=>0, 'msg'=>'文章刪除成功'];
            }else{
               return  ['status'=>1, 'msg'=>'文章刪除失敗, 請稍後重試'];
            }
        }
    }
    
    
    //get admin/article/{category} 顯示單個文章
    public function show(){
        
    }
   
    //更新排序
    public function changeOrder(){
        
        $input = Input::except('_token');
        
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
        
        if($re){
            $data = ['status'=>0, 'msg' => '文章排序更新成功'];
        }else{
            $data = ['status'=>1, 'msg' => '文章排序更新失敗, 請稍後重試'];
        }
        
        return  $data;
    }
}
