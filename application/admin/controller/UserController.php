<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class UserController extends BaseController
{
   public function index(){
       $where = '1=1';

       if(!empty($username = input("username"))){
           $where .= "  and username like '%$username%'";
       }
       if(!empty($phone = input("phone"))){
           $where .= "  and  phone like '%$phone%'";
       }
       $count = Db::name('admin')->where($where)->order('id')->count();
       $models =  Db::name('admin')->where($where)->order('id')->paginate(5,$count,['query'=>['username'=>$username,'phone'=>$phone],'type' => 'bootstrap3']);
        $page =  $models->render();
       if(request()->isAjax()){
           //如果是ajax请求，则渲染到该页面
//           return $html;

           return  $this->fetch('list',compact('models','page'));
       }
       return $this->fetch('index',compact('models','page'));

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
        $data['status']? $data['status']='0': $data['status']='1';
        Db::name('admin')->update($data);
        return prompt('修改成功','/admin/user/index');

    }
    public function img(){
        return $this->fetch('img');

    }
}
