<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
//use Illuminate\Contracts\Validation\Validator;
use \Validator;

class IndexController extends CommonController
{
    public function index(){
        return view('admin.index');
    }
    
    public function index2(){
        return view('admin.index2');
    }
    
    //更改超級管理員密碼
    public function pass(){
        if($input = Input::all()){
            //dd($input);
            $rules = [
                'password_o'=>'required|between:6,20',
                'password'=>'required|between:6,20|confirmed',
                'password_confirmation'=>'required|between:6,20',
            ];
            
            $message = [
                'password_o.required'=>'舊密碼不得為空',
                'password_o.between'=>'舊密碼必須在6-20位之間',
                
                'password.required'=>'新密碼不得為空',
                'password.between'=>'新密碼必須在6-20位之間',
                'password.confirmed'=>'新密碼和確認密碼不同',
                
                'password_confirmation.required'=>'確認密碼不得為空',
                'password_confirmation.between'=>'確認密碼必須在6-20位之間',
            ];
            
            $validator = Validator::make($input, $rules, $message);
            
            if($validator->passes()){
                echo "OK";
            }else{
                return back()->withErrors($validator);
            }
        }else{
            return view('admin.pass');
        }
    }
}
