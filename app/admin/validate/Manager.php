<?php
declare (strict_types = 1);

namespace app\admin\validate;

use think\Validate;

class Manager extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [
        'oldpass'   => 'require|min:6',
        'newpass'   => 'require|min:6',
        'repass'    => 'confirm:newpass',
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [
        'oldpass.require'   => "旧密码不能为空",
        'oldpass.min'       => "旧密码不能小于6位",
        'newpass.require'   => "新密码不能为空",
        'newpass.min'       => "新密码不能小于6位",
        'repass.confirm'    => "两次密码输入不一致",
    ];
}
