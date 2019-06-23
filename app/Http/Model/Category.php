<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded = [];
    
    //取得樹狀結構
    public function tree(){
        $categorys = $this->orderBy('cate_order', 'asc')->get();
        return  $this->getTree($categorys, 'cate_name', 'cate_id', 'cate_pid', 0);
    }
    
    //組裝樹狀結構
    public function getTree($data, $field_name, $field_id='id', $field_pid='pid' , $pid=0){
        $arr = array();
        foreach($data as $v){
            if($v->$field_pid == $pid){
                $v['_' . $field_name] = $v->$field_name;
                $arr[] = $v;
                foreach($data as $n){
                    if($n->$field_pid == $v->$field_id){
                        $n['_' . $field_name] = '├─ ' . $n->$field_name;
                        $arr[] = $n;
                    }
                }
            }
        }
        return $arr;
    }
}

