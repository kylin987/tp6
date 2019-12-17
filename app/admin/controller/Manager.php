<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\Request;
use app\admin\model\Manager as ManagerModel;
use think\facade\Session;
use app\admin\validate\Manager as ManagerValidate;
use think\exception\ValidateException;

class Manager
{

    public function setPassword(){

        return view();
    }

    public function storePassword(Request $request){
        Session::set('adminid',1);
        $data = $request->post();

        //数据基础验证
        try {
            validate(ManagerValidate::class)->check($data);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
             return return_msg(0,$e->getError());
        }
        

        $manager = ManagerModel::find(Session::get('adminid'));
        if(!$manager){
            return return_msg(0,"登录状态异常");
        }

        if(!password_verify($data['oldpass'], $manager['password'])){
            return return_msg(0,"旧密码不正确");
        }


        $result = ManagerModel::store($manager,$data);

        if($result){
            return return_msg(1,"密码修改成功");
        }else {
            return return_msg(0,"修改失败");
        }
    }
}
