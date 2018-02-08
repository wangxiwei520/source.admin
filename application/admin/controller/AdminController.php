<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class AdminController extends Controller
{
    public function index(){

//        var_dump(1);exit;
//       $models =  Db::name('admin')->select();
        return $this->fetch('index',compact('models'));
    }
}
