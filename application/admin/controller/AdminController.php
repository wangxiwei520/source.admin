<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class AdminController extends BaseController
{

    public function index(){

//        var_dump(1);exit;
//       $models =  Db::name('admin')->select();
        return $this->fetch('index');
    }
    public function login(){

        if (\request()->isPost()) {
           $user = Db::name('admin')->where('username',input('username'))->find();
            if ($user && $user['status']=='1' && password_verify(input('password'),$user['password'])) {
                session('login','login');
                if(input('checkbox')!=null){
//                    var_dump(11);exit;
                }
                return $this->fetch('index');
            }else{

                return '您没有登录权限';
            }
        }
        $ip =  $_SERVER["REMOTE_ADDR"];
        //获取用户登录地址
        $city  =  getCity($ip);
         session('ip',$ip);
         session('city',$city);
        return $this->fetch('login',compact('city'));
    }
    public function logout(){

        session('login',null);
//        var_dump(session('login'));exit;
        return $this->redirect('/admin/admin/login');
    }
}
