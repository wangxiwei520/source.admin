<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class WorkermanController extends Controller
{

    public function index()
    {
           return $this->fetch('index');
    }


}
