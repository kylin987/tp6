<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\facade\Request;
use app\admin\model\Manager as ManagerModel;
use think\facade\Session;
use app\admin\validate\Manager as ManagerValidate;
use think\exception\ValidateException;

class Login
{
    public function login(){
    	return view();
    }

    public function doLogin(Request $request){
    	$data = $request::post();
    	//数据基础验证
        try {
            validate(ManagerValidate::class)->scene('login')->check($data);
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
             return return_msg(0,$e->getError());
        }
    	$manager = ManagerModel::where('username', $data['username'])->find();

    	if($manager){
    		if(password_verify($data['password'], $manager['password'])){
	            Session::set('adminname',$manager->username);
	            Session::set('adminid',$manager->id);
	            return return_msg(1,"登录成功");
	        }else{
	        	return return_msg(0,"密码错误");
	        }
    	}else{
    		return return_msg(0,"用户名不存在");
    	}
    }
}
