<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;

class Login extends Controller
{
    public function index()
    {

        return $this->fetch('login');
    }

    public function  checklogin(){

        //管理员登录
        if(request()->isAjax()){
            $admin=new Admin();
            $data=input('post.');
            $res=$admin->login($data);
            if($res==3){
                return json_encode(array('status'=>'登录成功','code'=>200));
            }else{
               return json_encode(array('status'=>'用户名或密码错误','code'=>400));
            }
        }else{
            $this->redirect('Login/index');
        }
    }

    public function logout(){
        session('username',null);
        session_destroy();
        return redirect('Login/index');
    }


}
