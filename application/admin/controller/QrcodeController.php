<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
class QrcodeController extends BaseController
{

    public function index()
    {
        return $this->fetch('index');
    }
    public function setCode($code){
        //获取文件临时路径
        $filepath = $_FILES['file']['tmp_name'];
        exit($this->qrcode($code,$filepath));
    }




}
