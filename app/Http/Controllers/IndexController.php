<?php

namespace App\Http\Controllers;


class IndexController extends Controller
{
    public function index(){
        echo "index";
    }
    
    public function show($user_id){
        echo "user_id: $user_id";
    }
}
