<?php

namespace app\admin\controller;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use think\Controller;
use think\Request;

class UploadController extends Controller
{

    public function index()
    {
       return $this->fetch('index');
    }
    public function upload(){

        $file =$_FILES['file']['tmp_name'];
        $config = [
            'accessKey' => 'of6mXn-m3plRAfRWgarjF4B3g_d8_lP1-51pWy0k',//AK
            'secretKey' => 'MEjtCsodnpJBBX4bb-MQk5q-OEEDXgAfWbL5jfZx',//SK
            'domain' => 'http://p2dog8slb.bkt.clouddn.com',//临时域名
            'bucket' => 'yii2',//空间名称
        ];
        $auth = new Auth($config['accessKey'], $config['secretKey']);
        $token = $auth->uploadToken($config['bucket']);
        $filePath =$file;
        $key = uniqid().'.png';
        $uploadMgr = new UploadManager();
        list($ret, $err) = $uploadMgr->putFile($token, $key, $filePath);
//        $url = $auth->getLink($key);0000
        if ($err !== null) {
            var_dump($err);
        }
    }

}
