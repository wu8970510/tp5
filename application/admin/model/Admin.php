<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/12
 * Time: 11:42
 */

namespace app\admin\model;
use think\Model;
use think\Db;

class Admin  extends  Model
{
    public function login($data){
        $map=array(
            'username'=>$data['username'],
            'status'=>1
        );
        $user=Db::table('user')->where($map)->find();
        if($user){
            if($user['password']==md5($data['pass'])){
                session('username',$user['username']);
                session('uid',$user['id']);
                if(session('username')!=null){
                    $data=array(
                        'login_total' => $user['login_total']+1,
                        'upd_ip' => $_SERVER['REMOTE_ADDR'],
                        'upd_time' => time(),
                    );
                    Db::table('user')->where(['id'=>$user['id']])->update($data);
                }
                return 3; //信息正确
            }else{
                return 2; //密码错误
            }
        }else{
               return 1; //用户名不存在
        }


    }
}