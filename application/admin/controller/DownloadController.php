<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class DownloadController extends Controller
{

    public function index()
    {
        return $this->fetch('index');
    }
  public function download(){
      $fileName = input('filename'); //得到文件名
      if (file_exists($fileName)==false) {
          return prompt('文件不存在');
      }
//      var_dump(file_exists($fileName));exit;
      downloadFile($fileName);

  }
    public function downloadFile($url)
    {

        $fileName = getUrlFileExt($url);
        if ($fileName==false) {
            return prompt('路径不正确');
        }
        $fileName = uniqid().'.'.$fileName;
        $file = file_get_contents($url);
        $path = 'url/'.$fileName;
        file_put_contents($path,$file);
        downloadFile('url/'.$fileName);
        unlink($path);
    }


}
