<?php

namespace app\admin\controller;

use Mrgoon\AliSms\AliSms;
use think\Controller;
use think\Request;

class SmsController extends Controller
{

    public function index()
    {
        return $this->fetch('index');
    }
    public function sms(){
        $config = [
            'sms'=> [
                'access_key' => input('access_key'),
                'access_secret' => input('access_secret'),
                'sign_name' => input('sign_name'),//模板名
            ],
           ];
        $code = rand(1000,9999);
        $aliSms = new AliSms();
        $response = $aliSms->sendSms(input('mobile'), input('tempplate_code'),['code'=> $code] , $config['sms']);
        if ($response->Message=='OK') {
            return prompt('发送成功');
        }
        return prompt('发送失败');
    }

}
