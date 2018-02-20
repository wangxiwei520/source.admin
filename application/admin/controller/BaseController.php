<?php

namespace app\admin\controller;

use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
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
    public function qrcode($code,$filepath){

        if ($code==null){
            $code='98wang';
        }
        $qrCode = new QrCode($code);
        if ($filepath) {
            $qrCode->setSize(300);

// Set advanced options
            $qrCode->setWriterByName('png');
            $qrCode->setMargin(10);
            $qrCode->setEncoding('UTF-8');
            $qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH);
            $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
            $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
//        $qrCode->setLabel('Scan the code', 16, __DIR__.'/../assets/fonts/noto_sans.otf', LabelAlignment::CENTER);
            $qrCode->setLogoPath($filepath);
            $qrCode->setLogoWidth(100);
            $qrCode->setValidateResult(false);
        }
// Directly output the QR code
        header('Content-Type: '.$qrCode->getContentType());
       $code = $qrCode->writeString();
       return $code;


    }
}
