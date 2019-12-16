<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\Request;
use \app\admin\model\Manager as ManagerModel;
use think\facade\Session;

class Manager
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }

    public function setPassword(){

        return view();
    }

    public function storePassword(Request $request){
        Session::set('adminid',1);
        $data = $request->post();

        //检查重复密码
        if($data['newpass'] !== $data['repass']){
            return json(['code'=>0,'msg'=>"两次密码输入不一致"]);
        }

        $manager = ManagerModel::find(Session::get('adminid'));
        if(!$manager){
            return json(['code'=>0,'msg'=>"登录状态异常"]);
        }

        if(!password_verify($data['oldpass'], $manager['password'])){
            return json(['code'=>0,'msg'=>"旧密码不正确"]);
        }


        $result = ManagerModel::store($manager,$data);

        if($result){
            return json(['code'=>1,'msg'=>"密码修改成功"]);
        }else {
            return json(['code'=>0,'msg'=>"修改失败"]);
        }
    }
}
