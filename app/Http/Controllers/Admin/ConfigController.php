<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Config;
use Illuminate\Support\Facades\Input;
use \Validator;


class ConfigController extends CommonController
{
    //get admin/config 全部設置列表
    public function index()
    {
        $data = Config::orderBy('conf_order', 'asc')->paginate(15);

        foreach ($data as $v) {
            switch ($v->field_type) {
                case 'input':
                    $v->_html = "<input type='text' name='conf_content[]' value='" . $v->conf_content . "' style='width:80%'>";
                    break;
                case 'textarea':
                    $v->_html = "<textarea name='conf_content[]' style='width:80%'>" . $v->conf_content . "</textarea>";
                    break;
                case 'radio':
                    //1|開啟, 0|關閉
                    $arr = explode(',', $v->field_value);
                    $str = "";

                    foreach ($arr as $n) {

                        $r = explode('|', $n);
                        $c = $v->conf_content == $r[0] ? ' checked ' : '';

                        $str .= "<input type='radio' name='conf_content[]'  value='" . $r[0] . "' " . $c . ">  " . $r[1] . "  ";
                    }
                    $v->_html = $str;

                    break;
                default:
                    $v->_html = "";
                    break;
            }
        }
        return view('admin.config.index', compact('data'));
    }

    //get admin/article/config 新增設置(介面)
    public function create()
    {
        return view('admin.config.add');
    }

    //post admin/config 新增設置(提交)
    public function store()
    {
        $input = Input::except(['_token', '_method']);

        $rules = [
            'conf_title' => 'required|between:1,50',
            'conf_name' => 'required|between:1,50',
            'conf_order' => 'required|integer',
            'conf_tips' => 'max:255',
            'field_type' => 'required|between:1,50',
        ];

        $message = [
            'conf_title.required' => '設置標題不得為空',
            'conf_title.between' => '設置標題必須在1-50位之間',

            'conf_name.required' => '變量名不得為空',
            'conf_name.between' => '變量名必須在1-50位之間',

            'conf_order.required' => '設置排序不得為空',
            'conf_order.integer' => '設置排序須為整數',

            'conf_tips.between' => '設置說明必須在1-255位之間',

            'conf_type.required' => '字段類型不得為空',
            'conf_type.between' => '字段類型必須在1-50位之間',

        ];

        $validator = Validator::make($input, $rules, $message);
        if ($validator->passes()) {
            $re = Config::create($input);

            if ($re) {
                return redirect('admin/config')->with(['success' => '設置新增成功']);
            } else {
                return view('admin.config.add')->with(['errors' => '設置新增失敗']);
            }

        } else {
            return back()->withErrors($validator);
        }
    }

    //get admin/config/{config}/edit  更新單個設置(介面)
    public function edit($config_id)
    {
        if (!session('success')) {
            session(['success' => null]);
        }

        $field = Config::find($config_id);
        if (!isset($field)) {
            return back()->withErrors('ID號不存在');
        } else {
            return view('admin.config.edit', compact('field', $field));
        }
    }

    //put|patch admin/config/{config} 更新單個設置(提交)
    public function update($config_id)
    {
        $input = Input::except(['_token', '_method']);

        $rules = [
            'conf_title' => 'required|between:1,50',
            'conf_name' => 'required|between:1,50',
            'conf_order' => 'required|integer',
            'conf_tips' => 'required|between:1,255',
            'field_type' => 'required|between:1,50',
            'field_value' => 'required|between:1,255',

        ];

        $message = [
            'conf_title.required' => '設置標題不得為空',
            'conf_title.between' => '設置標題必須在1-50位之間',

            'conf_name.required' => '變量名不得為空',
            'conf_name.between' => '變量名必須在1-50位之間',

            'conf_order.required' => '設置排序不得為空',
            'conf_order.integer' => '設置排序須為整數',

            'conf_tips.required' => '設置說明不得為空',
            'conf_tips.between' => '設置說明必須在1-255位之間',

            'conf_type.required' => '字段類型不得為空',
            'conf_type.between' => '字段類型必須在1-50位之間',

            'config_value.required' => '變量值不得為空',
            'config_value.between' => '變量值必須在1-255位之間',
        ];

        $validator = Validator::make($input, $rules, $message);
        if ($validator->passes()) {
            $config = Config::find($config_id);

            if (!isset($config)) {
                return back()->withErrors('更新失敗, 請稍後重試');
            } else {
                if ($config->update($input)) {
                    return redirect('admin/config')->with(['success' => '設置更新成功']);
                } else {
                    return back()->withErrors('設置訊息更新失敗, 請稍後重試');
                }
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    //delete admin/config/{config} 刪除單個設置
    public function destroy($config_id)
    {
        $config = Config::find($config_id);
        if (!isset($config)) {
            return ['status' => 1, 'msg' => '設置ID錯誤刪除失敗, 請稍後重試'];
        } else {
            $re = $config->delete();

            if ($re) {
                return ['status' => 0, 'msg' => '設置刪除成功'];
            } else {
                return ['status' => 1, 'msg' => '設置刪除失敗, 請稍後重試'];
            }
        }
    }


    //get admin/config/{config} 顯示單個設置
    public function show()
    {

    }

    //更新排序
    public function changeOrder()
    {

        $input = Input::except('_token');
        $config = Config::find($input['conf_id']);
        $config->conf_order = $input['conf_order'];
        $re = $config->update();

        if ($re) {
            $data = ['status' => 0, 'msg' => '設置排序更新成功'];
        } else {
            $data = ['status' => 1, 'msg' => '設置排序更新失敗, 請稍後重試'];
        }

        return $data;
    }

    //修改配置項內容
    public function changeContent()
    {
        $input = Input::all();
        foreach ($input['conf_id'] as $k => $v) {
            Config::where('conf_id', '=', $v)->update(['conf_content' => $input['conf_content'][$k]]);
        }
        //->with(['errors' => '設置更新成功']);
        return back()->withErrors('設置更新成功');
    }

    public function putFile()
    {
        $config = Config::all();


        dd($config);
    }
}
