<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2020/4/2
 * Time: 9:52
 */
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Cookie;

class Login extends Controller{
    public function login(){
        if (request()->isGet()) {
            return view();
        }
        if (request()->isPost()) {
            //接值判断
            $admin_name = request()->post("admin_name");
            $admin_pwd = request()->post("admin_pwd");
            //var_dump($admin_name);
            if ($admin_name == ""){
                echo json_encode(["status" => 2, "msg" => "账号不能为空"]);
            }
            if($admin_pwd == ""){
                echo json_encode(["status" => 2, "msg" => "密码验不能为空"]);
            }

            $data = Db::name('admin')->where(['admin'=>$admin_name])->find();
            //var_dump($data);exit;
            if (!$data) {
                echo json_encode(["status" => 2, "msg" => "账号不存在"]);
            } else {

                //密码加密进行查询
                if (md5($admin_pwd) != $data["pwd"]) {
                    echo json_encode(["status" => 2, "msg" => "密码错误，请重新输入"]);
                } else {
                    $arr = [
                        "admin_id" => $data["id"],
                        "admin_name" =>md5($data["admin"].$data['cookie_sut']),
                    ];
                    //var_dump($arr);exit;
                    Cookie::set("admin", $arr);
                    echo json_encode(["status" => 1, "msg" => "登录成功"]);
                }
            }
        }
    }
}