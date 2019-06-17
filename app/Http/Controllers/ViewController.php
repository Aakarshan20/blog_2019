<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index(){
        
        $data = [
            'name'=>'aabc',
            'age'=>50,
            'score'=>70,
            'num'=>10,
            'article'=>['news1', 'news2', 'news3'],
            //'article'=>[]
        ];
        
        //$title = "測試用標題";
        $title = null;
        
        return view('my_laravel', compact('data', 'title'));
        //return view('my_laravel');
    }
    
    public function view(){
        echo config('database.connections.mysql.prefix');
        
        return view('index_2');
    }
    public function article(){
        return view('article');
    }
    
    public function layouts(){
        return view('layouts');
    }
}
