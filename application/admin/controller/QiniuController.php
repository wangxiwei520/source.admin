<?php

namespace app\admin\controller;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use think\App;
use think\Controller;
use think\Request;

class QiniuController extends Controller
{

    public function index()
    {

        return $this->fetch('index');
    }
   public function upload(){

       $file =$_FILES['file']['tmp_name'];
       $config = [
           'accessKey' => input('accessKey'),//AK
           'secretKey' => input('secretKey'),//SK
           'bucket' => input('bucket'),//空间名称
       ];
       $auth = new Auth($config['accessKey'], $config['secretKey']);
       $token = $auth->uploadToken($config['bucket']);
       $filePath =$file;
       $key = uniqid().'.png';
       $uploadMgr = new UploadManager();
       list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
//        $url = $auth->getLink($key);0000
       if ($err !== null) {
           return prompt('上传失败');
       } else {
          return prompt('上传成功');
       }
   }


}
