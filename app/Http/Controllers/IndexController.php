<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Model\User;

class IndexController extends Controller
{
    public function index(){

        return view('welcome');
    }
    
}
