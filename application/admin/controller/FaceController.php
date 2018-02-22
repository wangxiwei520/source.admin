<?php

namespace app\admin\controller;
require_once 'AipFace.php';
use think\Controller;
use think\Request;

class FaceController extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        return $this->fetch('index');

    }
public function face(){
    $APP_ID='10845059';
    $API_KEY='nesEdrDFHNgREubIP15uyj2d';
    $SECRET_KEY='A5S7GeL0gNrQfdSFpIPgydxgQTxOn2DX';
    $client = new \AipFace($APP_ID, $API_KEY, $SECRET_KEY);

    $tmp = $_FILES['file']['tmp_name'];
    $filepath = 'images/';
    $imgpath=$filepath.uniqid().'.jpg';
    if(!move_uploaded_file($tmp,$imgpath)){
        echo "上传失败";
    }
    $image = file_get_contents($imgpath);
// 调用人脸检测
    $client->detect($image);
// 如果有可选参数
    $options = array();
    $options["max_face_num"] = 2;
    $options["face_fields"] = "age,beauty,expression,race,gender";

// 带参数调用人脸检测
    $img =  $client->detect($image, $options);
//    var_dump($img);exit;
    return $this->fetch('face',compact('img','imgpath'));

}

}
