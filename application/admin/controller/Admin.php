<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/13
 * Time: 13:46
 */
class Admin extends Controller
{
    public function index(){

        $data=Db::table('user')->select();

        $this->assign('data',$data);


        return $this->fetch('admin-list');
    }

    public function change_status(){
         if(request()->isAjax()){

         }
    }


}
