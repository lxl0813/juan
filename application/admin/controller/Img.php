<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2020/4/6
 * Time: 17:36
 */
namespace app\admin\controller;
use think\Controller;

class Img extends Controller{
    public function index(){
        echo 1;exit;
        var_dump(input('img'));exit;
        $this->assign('img',input('img'));
        return $this->fetch();
    }
}