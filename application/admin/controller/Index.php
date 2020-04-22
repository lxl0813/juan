<?php
namespace app\admin\controller;

use think\Db;

class Index extends Common
{
    public function index(){
        $data=Db::name('user')->order('time')->paginate(10);
		$datas=$this->object_array($data);
        foreach($datas as $key=>$value){
            $datas[$key]['shop_name']=Db::name('shop')->where(['sn'=>$value['sn']])->value('name');
        }
        $this->assign('data', $datas);
        $this->assign('page',$data->render());
        return $this->fetch('index');
    }

    public function object_array($object) {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        }
        else {
            $array = $object;
        }
        return $array;
    }

    public function ok(){
        $id = input('id');
        $success=Db::name('user')->where(['id'=>$id])->update(['status'=>1]);
        if($success){
            echo json_encode(['status'=>1,'msg'=>'审核完成']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'操作失败，稍后再试']);
        }
    }

    public function no(){
        $id = input('id');
        $error = Db::name('user')->where(['id'=>$id])->update(['status'=>2]);
        if($error){
            echo json_encode(['status'=>1,'msg'=>'驳回成功']);
        }else{
            echo json_encode(['status'=>2,'msg'=>'操作失败，稍后再试']);
        }
    }

    public function img(){
        //echo 1;exit;
        //var_dump(input('img'));exit;
        $this->assign('img',input('img'));
        return $this->fetch();
    }
	
	



}
