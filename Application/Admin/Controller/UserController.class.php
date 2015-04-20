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
}