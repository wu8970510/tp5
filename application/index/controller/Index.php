<?php
namespace app\index\controller;
use think\Db;
use think\Request;
use think\Controller;
use think\Cache;
use think\Session;
use think\Cookie;

class Index extends Controller
{
    public function index()
    {




//        $user= new \app\index\model\User;
//        dump($user);

         $data=Db::table('user')->select();
        // $data=DB::query('select * from user where id>? and id<=?',[2,4]);
         cache::set('username',$data,200);
//         $data=Db::name('user')->where($where)->select();
//
       	$this->assign('data',$data);

//        多表查询
//         $data=Db::query('select goods.*,class.name cname from goods,class where goods.class_id=class.id');
//         $data=Db::table('goods')->field('goods.*,class.name cname')->join('class','goods.class_id=class.id')->select();
//

       	return view();

    }

    public function test(){
    	echo '路由';
    }

    public function course(){
    	echo input('id');
    }

    public function qingqiu(){
        return view();
    }

    public function getType(Request $request){
           
        dump( $request->ip());
    }       

    public function reg(){
        return view();
    }

    public function guolv(Request $request){
        // $data=input('post.');
        $data=$request->filter('htmlspecialchars');
        dump($request->post());
    }

    public function insert(){
        $param=[
            'name'=>'z3',
            'age'=>25
        ];
        $data=Db::table('user')->insert($param);


    }

    public function shiwu(){
        Db::startTrans();
        try {
            Db::table('user')->delete(7);
            Db::table('user')->delete(8);
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
        }
    }
    public function update()
    {
        $data=Db::table('user')->where('id',9)->update(['name'=>'s4']);
    }

    public function delete($id){
        
        $data=DB::execute("delete from user where id=:id",["id"=>$id]);
        dump($id);
    }

    public function  huancun(){


       if(cache('username')){
           echo '111';
       }else{
           $data=Db::table('user')->select();
           dump($data);
           cache('username',$data,5);
       }

    }

    public function setSession(){
        Session::set('name','秃总');
    }
    public  function getSession(){
        dump(session::get('name'));
    }

    public function setCookie(){
        Cookie::set('name','阿秃');
    }
}
