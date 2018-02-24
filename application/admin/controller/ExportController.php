<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use tp5er\Backup;

class ExportController extends Controller
{

    public function index()
    {
        return $this->fetch('index');
    }
    public function export(){
        $config=array(
            'path'     => './url/',//数据库备份路径
            'part'     => 20971520,//数据库备份卷大小
            'compress' => 0,//数据库备份文件是否启用压缩 0不压缩 1 压缩
            'level'    => 9 //数据库备份文件压缩级别 1普通 4 一般  9最高
        );
        $db= new Backup($config);
        $file=['name'=>date('Ymd-His'),'part'=>1];
        $tables="menu";
        $start= $db->setFile($file)->backup($tables, 0);
        if ($start!='0') {
           return prompt('数据库不存在');
        }
        $path = $config['path'].$file['name'].'-1.sql';
        downloadFile($path);
        return prompt('导出成功');
    }
    public function excel(){

        $PHPExcel = new \PHPExcel();
        $PHPSheet = $PHPExcel->getActiveSheet();
        $PHPSheet->setTitle("demo"); //给当前活动sheet设置名称
        $admins = Db::name('menu')->select();
        //获取字段注释
        $annotation = Db::query('show full columns from menu');
        foreach ($annotation as $k1=>$v1){
            //设置菜单
            $PHPSheet->setCellValue(config('excel')[$k1].'1',$v1['Comment']);
            foreach ($admins as $k2=>$v2){
                //转换索引数组
               $arr = toIndexArr($v2);
                foreach ($arr as $k3=>$v3){
                    //设置内容
                    $PHPSheet->setCellValue(config('excel')[$k3].($k2+2),$v3);
                    }
            }
        }
        $PHPWriter = \PHPExcel_IOFactory::createWriter($PHPExcel,"Excel2007");//创建生成的格式
        header('Content-Disposition: attachment;filename="菜单.xlsx"');//下载下来的表格名
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件
    }
}
