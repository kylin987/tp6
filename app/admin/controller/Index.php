<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\facade\Route;

class Index
{
    public function index()
    {
        return view();
    }

    public function welcome()
    {
        return view();
    }

    public function hello($name)
    {
        return 'hello ' . $name;
    }
}
