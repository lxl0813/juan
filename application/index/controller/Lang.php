<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 2019/12/23
 * Time: 16:34
 */
namespace app\index\controller;
class Lang{
    public function lang(){
        $lang = input('lang');
        //var_dump($lang);exit;
        switch ($lang) {
            case 'en':
                cookie('think_var', 'en_us');
                break;
            case 'zh':
                cookie('think_var', 'zh_cn');
                break;
            case 'sh':
                cookie('think_var', 'sh_sh');
                break;
            case 'fh':
                cookie('think_var', 'fh_fh');
                break;
            default:
                cookie('think_var', 'zh_cn');
                break;
        }
    }
};