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
/**
 * 获取文件扩展名
 * @param 网页URL $url
 * @return string
 */
function getUrlFileExt($url)
{
    $ary = parse_url($url);
    $file = basename($ary['path']);
    $ext = explode('.',$file);
   if (count($ext)>1) {
       return $ext[1];
   }
   return false;
}
function downloadFile($fileName){
    header( "Content-Disposition:  attachment;  filename=".$fileName); //告诉浏览器通过附件形式来处理文件
    header('Content-Length: ' . filesize($fileName)); //下载文件大小
    readfile($fileName);  //读取文件内容
}
