<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class BaseController extends Controller
{
    public function _initialize()
    {

        $admin = \request()->controller();
        $action = \request()->action();
        $url = $admin.'-'.$action;
//        var_dump(session('login')!='login');exit;
        if(session('login')!='login' && $url!='Admin'.'-'.'login'){

            return   $this->redirect('/admin/admin/login');
        }

        parent::_initialize();
    }
    public static function getData($db,$id){

        return  Db::query("select * from $db where id=?",[$id]);

    }
}
