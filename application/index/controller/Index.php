<?php
namespace app\index\controller;

use think\Controller;
use think\Cookie;
use think\Db;

class Index extends Controller
{
    public function index(){
        if(request()->isGet()){
            if(Cookie::get('think_var')=='en_us'){
                //获取英文版商品信息
                $shop=Db::name('shop')->field('id, sn,name_en,content_en,y_price')->select();
                foreach($shop as $k=>$v){
                    $shop[$k]['name']=$v['name_en'];
                    $shop[$k]['content']=$v['content_en'];
                    $shop[$k]['price']=$v['y_price'];
                    unset($shop[$k]['name_en']);unset($shop[$k]['content_en']);unset($shop[$k]['y_price']);
                }
                $data='en';
            }elseif(Cookie::get('think_var')=='sh_sh'){
                $shop=Db::name('shop')->field('id,sn,name_sh,content_sh,y_price')->select();
                foreach($shop as $k=>$v){
                    $shop[$k]['name']=$v['name_sh'];
                    $shop[$k]['content']=$v['content_sh'];
                    $shop[$k]['price']=$v['y_price'];
                    unset($shop[$k]['name_sh']);unset($shop[$k]['content_sh']);unset($shop[$k]['y_price']);
                }
                $data='sh';
            }elseif(Cookie::get('think_var')=='fh_fh'){
                $shop=Db::name('shop')->field('id,sn,name_fh,content_fh,y_price')->select();
                foreach($shop as $k=>$v){
                    $shop[$k]['name']=$v['name_fh'];
                    $shop[$k]['content']=$v['content_fh'];
                    $shop[$k]['price']=$v['y_price'];
                    unset($shop[$k]['name_fh']);unset($shop[$k]['content_fh']);unset($shop[$k]['y_price']);
                }
                $data='fh';
            }else{
                $shop=Db::name('shop')->field('id,sn,name,content,price')->select();
                $data='zh';
            }
            return view('',['data'=>$data,'shop'=>$shop]);
        }

        if(request()->isPost()){
            $data=input('param.');

            if(Cookie::get('think_var')=='en_us') {
                if($data==''){
                    $this->error('Please fill in the information');
                }elseif($data['juan_email']==''){
                    $this->error('Please fill in the postcode');
                }elseif($data['sn']==''){
                    $this->error('Please fill in the contact number');
                }elseif($data['shou_name']=='') {
                    $this->error('Please fill in the shipping address');
                }elseif($data['shou_phone']=='') {
                    $this->error('Please fill in the shipping address');
                }elseif($data['shou_zip']=='') {
                    $this->error('Please fill in the shipping address');
                }elseif($data['shou_address']==''){
                    $this->error('Please fill in the shipping address');
                }elseif(!Db::name('shop')->where(['sn'=>$data['sn']])->find() ){
                    $this->error('Wrong product number');
                }else{

                }

            }elseif(Cookie::get('think_var')=='sh_sh'){
                if($data==''){
                    $this->error('Please fill in the information');
                }elseif($data['juan_email']==''){
                    $this->error('Please fill in the postcode');
                }elseif($data['sn']==''){
                    $this->error('Please fill in the contact number');
                }elseif($data['shou_name']=='') {
                    $this->error('Please fill in the shipping address');
                }elseif($data['shou_phone']=='') {
                    $this->error('Please fill in the shipping address');
                }elseif($data['shou_zip']=='') {
                    $this->error('Please fill in the shipping address');
                }elseif($data['shou_address']==''){
                    $this->error('Please fill in the shipping address');
                }elseif(!Db::name('shop')->where(['sn'=>$data['sn']])->find() ){
                    $this->error('Código de producto erróneo');
                }else{

                }


            }elseif(Cookie::get('think_var')=='fh_fh'){

                if($data==''){
                    $this->error('Please fill in the information');
                }elseif($data['juan_email']==''){
                    $this->error('Please fill in the postcode');
                }elseif($data['sn']==''){
                    $this->error('Please fill in the contact number');
                }elseif($data['shou_name']=='') {
                    $this->error('Please fill in the shipping address');
                }elseif($data['shou_phone']=='') {
                    $this->error('Please fill in the shipping address');
                }elseif($data['shou_zip']=='') {
                    $this->error('Please fill in the shipping address');
                }elseif($data['shou_address']==''){
                    $this->error('Please fill in the shipping address');
                }elseif(!Db::name('shop')->where(['sn'=>$data['sn']])->find() ){
                    $this->error('Erreur dans le codage des produits');
                }else{

                }

            }else{

                if($data==''){
                    $this->error('请填写信息');
                }elseif($data['juan_email']==''){
                    $this->error('请填写捐赠人邮箱');
                }elseif($data['sn']==''){
                    $this->error('请填写所购买商品的编号');
                }elseif($data['shou_name']=='') {
                    $this->error('请填写受捐人姓名');
                }elseif($data['shou_phone']=='') {
                    $this->error('请填写受捐人电话号码');
                }elseif($data['shou_zip']=='') {
                    $this->error('请填写受捐人邮编');
                }elseif($data['shou_address']==''){
                    $this->error('请填写收货地址');
                }elseif(!Db::name('shop')->where(['sn'=>$data['sn']])->find() ){
                    $this->error('产品编号错误');
                }else{

                }
            }

            // 获取表单上传文件 例如上传了001.jpg
            $ext=$_FILES['file']['name'];
            $end = strrchr($ext,'.');
            $filetype = ['.jpg', '.jpeg', '.gif', '.bmp', '.png'];

            //判断上传文件格式
            if(!in_array($end,$filetype)){
                if(Cookie::get('think_var')=='en_us'){
                    $this->error('Please upload pictures as JPG, jpeg, GIF, BMP, PNG');
                }elseif(Cookie::get('think_var')=='sh_sh'){
                    $this->error('Por favor, suba las imágenes en formato JPG, jpeg, GIF, BMP, PNG');
                }elseif(Cookie::get('think_var')=='fh_fh'){
                    $this->error('Veuillez mettre en ligne des images en format JPG, jpeg, GIF, BMP, PNG');
                }else{
                    $this->error('请上传JPG, jpeg, GIF, BMP, PNG格式的图片');
                }
            }
            $dir='../public/imgs/'.date('Y/m/d').'/';
            if (!file_exists($dir)){
                mkdir($dir,0777,true);
            }
            $tmp_name=$_FILES['file']['tmp_name'];
            $new_photo=uniqid().'.'.$ext;
            if (move_uploaded_file($tmp_name,$dir.$new_photo)){
                $data['img']=substr($dir.$new_photo,9);
                $name=Db::name('shop')->where(['sn'=>$data['sn']])->value('name');
                $data['shop_name']=$name;
                $data['time']=time();
                $data['time_all']=date('Y-m-d H:i:s',$data['time']);
                if(Db::name('user')->insert(
                    [
                        'shop_name'=>$data['shop_name'],
                        'juan_email'=>$data['juan_email'],
                        'sn'=>$data['sn'],
                        'shou_name'=>$data['shou_name'],
                        'shou_phone'=>$data['shou_phone'],
                        'shou_zip'=>$data['shou_zip'],
                        'shou_address'=>$data['shou_address'],
                        'pz'=>$data['img'],
                        'time_all'=>$data['time_all'],
                        'time'=>$data['time']
                    ])
                ){
                    if(Cookie::get('think_var')=='en_us') {
                        $this->success('Information submitted successfully, please wait for review！');
                    }elseif(Cookie::get('think_var')=='sh_sh'){
                        $this->success('La información ha sido presentada con éxito, por favor espere a la revisión！');
                    }elseif(Cookie::get('think_var')=='fh_fh'){
                        $this->success('Information soumise avec succès, veuillez attendre son examen！');
                    }else{
                        $this->success('信息提交成功，请等待审核！');
                    }
                }

            }

        }

    }





}
