<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        
    }
    
    //后台登录界面
    public function login(){
        $this->display();
    }
    //后台登陆操作 
    public function doLogin(){
        $data['username'] = I('post.username');
        $data['password'] = I('post.password');
        
        $admin = M('adminuser');
        $res = $admin->where($data)->find();
        
        if ($res) {
            // 将用户的登录信息保存在SESSION中
            session('username', $data['username']);     // 用户名
            session('isLogin', true);                   // 是否为登录状态
            // 登录成功，跳转到主页
            $this->success('欢迎回来：' . $data['username'], U('Index/index'));
        } else {
            $this->error('用户名或密码错误！');
        }
    }
    

     //方法功能：后台用户退出登录
    public function logout() {
        // 删除后台需要存储的ID信息
      
        session('username', NULL);
        session('isLogin', NULL);
    
        // 清楚Cookie中保存的信息
        //cookie(NULL, 'blue_');
    
        $this->redirect('User/login');
    }
    //个人资料
    public function user(){
        $admin = M('adminuser')->select();
        $this->assign("admin",$admin[0]);
        $this->display();
    }
    //管理员编辑
    public function doEdit(){
        $id = I('post.id');
        $data['username'] = I('post.username');
        $data['password'] = I('post.password');
        $user = M('adminuser');
        $userid = $user->where("id=$id")->save($data);
        if($userid){
            $this->success('修改成功');
        }
        //var_dump($_POST);
    }
}