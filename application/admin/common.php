<?php
//获取所在地
function getCity($ip)
{
    header("Content-Type:text/html;charset=utf-8");
    //调的淘宝接口
    $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
    $ipinfo=json_decode(file_get_contents($url));
    if($ipinfo->code=='1'){
        return false;
    }
    $city =$ipinfo->data->city;
    return  $city;

}
function prompt($msg = '', $url = null,$code=1, $data = ''){
    $result = [
        'code'=>$code,
        'msg'=>$msg,
        'url'=>$url,
        'data'=>$data
    ] ;

    return json($result);
}
