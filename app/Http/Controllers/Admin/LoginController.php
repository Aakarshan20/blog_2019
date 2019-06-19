<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Crypt;
use App\Http\Model\User;
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
            
            $user = User::first();
            
            if($user->user_name != $input['user_name'] || 
                    Crypt::decrypt($user->user_pass) != $input['user_pass'] ){
                return back()->with('msg', '用戶名或密碼錯誤');
            }
            
            session(['user'=>$user]);
            echo "OK";
            
        }else{
            
            
            return view('admin.login');
        }
        
    }
    
    public function code(){
        $code = new \Code();
        $code->imgcode(165,34);
    }
    
    public function crypt(){
        $str = '123456';
        
        echo $crypt = Crypt::encrypt($str);
        echo Crypt::decrypt($crypt);
    }
    
}
