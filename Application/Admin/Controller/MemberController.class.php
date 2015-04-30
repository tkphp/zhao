<?php
namespace Admin\Controller;
use Think\Controller;
class MemberController extends MyController {

    // 实现父类的构造方法，可对用户登录进行验证
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $members = D("user"); // 实例化对象
        $count      = $members->where()->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $member = $members->where()->limit($Page->firstRow.','.$Page->listRows)->select();
        //$this->assign('cats', $cats);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign("members", $member); 
        $this->display();
    }
}