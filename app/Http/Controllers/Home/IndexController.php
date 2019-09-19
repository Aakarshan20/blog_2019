<?php

namespace App\Http\Controllers\Home;
use Illuminate\Support\Facades\DB;
use App\Http\Model\User;
use App\Http\Model\Article;

class IndexController extends CommonController
{
    public function index(){
        //點擊量最高的文章
        //$hot = Article::orderBy('art_view', 'desc')->orderBy('art_id', 'desc')->take(6)->get();
        //圖文列表(帶分頁)
        //$data = Article::orderBy('art_time', 'desc')->paginate(9);
        //dd($data);
        //最新文章3筆
        $data = Article::orderBy('art_time', 'desc')->take(3)->get();
        //友情鏈接
        //網站配置項
        return view('portal.index',compact('data'));
    }

    public function contact(){
        return view('portal.contact');
    }

    public function about(){
        return view('portal.about');
    }
}
