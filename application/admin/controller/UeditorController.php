<?php

namespace app\admin\controller;

use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use think\Controller;
use think\db\Query;
use think\Request;

class UeditorController extends Controller
{

    public function index()
    {
        return $this->fetch('index');

    }
    public function add(){




    }

}
