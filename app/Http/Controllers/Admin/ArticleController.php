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
        $data = Article::orderBy('art_id', 'desc')->paginate(15);
        return view('admin.article.index', compact('data'));
    }

    //get admin/article/create 新增文章(介面)
    public function create(){
        $data = (new Category)->tree();
        return view('admin.article.add', compact('data'));
    }

    //post admin/article 新增文章(提交)
    public function store(){

        $input = Input::except(['_token', 'fileselect']);
         $rules = [

                'art_title'=>'required|between:1,100',
                'art_content'=>'required',
            ];

            $message = [
                'art_title.required'=>'文章標題不得為空',
                'art_title.between'=>'文章標題必須在1-100位之間',

                'art_content.required'=>'文章內容不得為空',
            ];

            $validator = Validator::make($input, $rules, $message);
            if($validator->passes()){
                $re = Article::create($input);

                if($re){
                    return redirect('admin/article')->with(['success'=>'文章文章新增成功']);
                }else{
                    return view('admin.category.add')->with(['errors'=>'文章文章新增失敗']);
                }
            }else{
                return back()->withErrors($validator);
            }
    }

     //get admin/article/{article}/edit  更新單個文章(介面)
    public function edit($art_id){
        if(!session('success')){
            session(['success'=>null]);
        }

        $field = Article::find($art_id);
        //$data = Category::where('cate_pid', 0)->get();
        $data = (new Category)->tree();
        if(!isset($field)){
            return back()->withErrors('ID號不存在');
        }else{
            return view('admin.article.edit', compact('field', 'data'));
        }
    }

    //put|patch admin/article/{article} 更新單個文章(提交)
    public function update($art_id){
        $input = Input::except(['_token', '_method', 'fileselect']);

        $rules = [

                'art_title'=>'required|between:1,100',
                'art_content'=>'required',
            ];

            $message = [
                'art_title.required'=>'文章標題不得為空',
                'art_title.between'=>'文章標題必須在1-100位之間',

                'art_content.required'=>'文章內容不得為空',
            ];

        $validator = Validator::make($input, $rules, $message);
        if($validator->passes()){
            $article = Article::find($art_id);

            if(!isset($article)){
                return back()->withErrors('更新失敗, 請稍後重試');
            }else{
                if($article->update($input)){
                    return redirect('admin/article/')->with(['success'=>'文章文章更新成功']);
                }else{
                    return back()->withErrors('文章訊息更新失敗, 請稍後重試');
                }
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //delete admin/article/{category} 刪除單個文章
    public function destroy($art_id){
        $article = Article::find($art_id);
        if(!isset($article)){
            return ['status'=>1, 'msg'=>'文章ID錯誤刪除失敗, 請稍後重試'];
        }else{
            $re = $article->delete();

            if($re){
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
