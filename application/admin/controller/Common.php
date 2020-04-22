<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2020/4/2
 * Time: 9:44
 */
namespace app\admin\controller;
use think\Controller;
use think\Cookie;

class Common extends Controller{
    public function __construct(){
        //echo 1;exit;
        parent::__construct();
        if(!Cookie::get("admin")){
            $this->redirect("Login/login");
        }
    }
}