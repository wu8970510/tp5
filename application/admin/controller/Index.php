<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {

        return $this->fetch();
    }

    public function welcome(){

 $data=array(
            'server_addr'=> isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : '',
            'server_name'=> isset($_SERVER["SERVER_NAME"]) ? $_SERVER["SERVER_NAME"] : '',
            'server_port'=> isset($_SERVER["SERVER_PORT"]) ? $_SERVER["SERVER_PORT"] : '',
            'server_software'=> isset($_SERVER["SERVER_SOFTWARE"]) ?  $_SERVER["SERVER_SOFTWARE"] : '',
            'document_root' => isset($_SERVER["DOCUMENT_ROOT"]) ? $_SERVER["DOCUMENT_ROOT"] : '',
            'server_sys' => isset($_SERVER["SYSTEMROOT"]) ? $_SERVER["SYSTEMROOT"] : '',
            'comspec' => isset($_SERVER["COMSPEC"]) ? $_SERVER["COMSPEC"] : '',

        );
        $info=Db::table('user')->field('username,login_total,upd_ip,upd_time')->where('status','=',1)->find();

        $this->assign('info',$info);

        $this->assign('data',$data);
        return $this->fetch();
    }
}
