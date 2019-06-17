<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

use App\Http\Model\User;

//require_once 'resources/org/code/code.php';


class IndexController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    
    public function login(){
        session(['admin'=>1]);
        return view('admin.login');
    }
    
    public function code(){
        $code = new \Code();
        $code->imgcode(165,34);
    }
}
