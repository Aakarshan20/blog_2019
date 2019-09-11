<?php
namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class CommonController extends Controller
{
    //圖片上傳
    public function upload(){
        $file = Input::file('file');//取得input中file的value

        if($file->isValid()){//判斷文件是否有效
            //以下為範例 暫時用不到
            //$clientName = $file->getClientOriginalName();//取得文件名
            //$tmpName = $file->getFileName(); //緩存在tmp文件夾中的文件名 如php9372.tmp這種的
            //$path = $file->move('storage/uploads');//移動到 public/storage/upload/php9372.tmp
            //$mimeTye = $file->getMimeType(); //取得mimeType 例:image/jpeg
            //$realPath = $file->getRealPath();//這個表示的是緩存在tmp文件夾下的文件絕對路徑，例C:\xampp\tmp\phpF2EC.tmp

            $extension = $file->getClientOriginalExtension();//上傳文件的後綴
            $newName = date('YmdHis').mt_rand(000,999).".".$extension;
            //$path = $file->move(app_path() . '/storage/uploads', $newName);

            //$path = $file->move(base_path() . '/uploads', $newName);
            $file->move(base_path() . '/public/uploads', $newName);//移動文件
            $filePath = 'uploads/' . $newName;

            return  $filePath;
        }
    }

    public function deleteFile(){
        $input = Input::all();//取得post

        dd($input);
    }

}
