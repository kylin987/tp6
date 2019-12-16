<?php
declare (strict_types = 1);

namespace app\admin\model;

use think\Model;

/**
 * @mixin think\Model
 */
class Manager extends Model
{
    public static function store($user,$data){
    	$user->password = password_hash($data['newpass'], PASSWORD_DEFAULT);
    	return $user->save();
    }
}
