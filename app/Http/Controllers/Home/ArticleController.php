<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Article;

class ArticleController extends CommonController
{
    //get /article 全部文章列表
    public function index(){
        $data = Article::orderBy('art_id', 'desc')->paginate(9);
        return view('portal.article-list', compact('data'));
    }

    //get article/{category} 顯示單個文章
    public function show($art_id){
        $article = Article::where('art_id', $art_id)->leftJoin('category', 'article.cate_id', '=', 'category.cate_id')->first();
        return view('portal.article', compact('article'));
    }
}
