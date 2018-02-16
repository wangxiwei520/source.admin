<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class UserController extends BaseController
{
   public function index(){
   //var_dump(1);exit;
       $models =  Db::name('admin')->select();
       return $this->fetch('index',compact('models'));

   }
   public  function add(){
       $data = input();
       $data['created_at']= $data['login_at']=time();
       $data['password']=password_hash( input('password'),1);
       if (Db::name('admin')->insert($data)) {
           return prompt('添加成功','/admin/user/index');
       }
      return prompt('添加失败',null,0);
   }
    public function getEdit(){

        return self::getData('admin',input('id'));


    }
    public function edit(){
//        var_dump(input('id'));exit;
        if (Db::name('admin')->update(input())) {
            return prompt('修改成功','/admin/user/index');

        }
        return prompt('修改失败',null,0);
    }

    public function del($id){
        if (Db::name('admin')->delete($id)) {
            return prompt('删除成功','/admin/user/index');
        }
        return prompt('删除失败',null,0);

    }
    //修改状态
    public function activate(){

        $data['status']=input('status_id');
        $data['id']=input('activate_id');
        if( $data['status']==='1'){
            $data['status']='0';
        }else{
            $data['status']='1';
        }
//       var_dump(input(),$data);exit;
       Db::name('admin')->update($data);
        return prompt('修改成功','/admin/user/index');

    }
}
