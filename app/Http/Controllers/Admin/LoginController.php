<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

require_once __DIR__ . '/../../../../resources/org/code/code.php';

class LoginController extends CommonController
{
    public function login(){
        $input = Input::all();
        if($input){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!=strtoupper($_code)){
                return back()->with('msg', '驗證碼錯誤');
            }
        }else{
            return view('admin.login');
        }
        
    }
    
    public function code(){
        $code = new \Code();
        $code->imgcode(165,34);
    }
    
}
