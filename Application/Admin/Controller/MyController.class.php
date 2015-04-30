<?php

namespace   Admin\Controller;
use         Think\Controller;

/**
 * 公共类，每个模块都可以调用这个类
 * 这个类下提供公共模块的相关信息，每个模块下共有的操作不需要多次调用
 * 这个类中的方法都不是为外部调用的，因此将这个类下面的所有方法设置为protected修饰
 *
 * 作者： Eden
 * 日期： 2015-01-06
 */
class MyController extends Controller {
    

    /**
     * 构造方法
     * 验证用户登录状态，其它控制器继承这个控制器，自动实际这个方法
     *
     * @author Eden
     * @date   2015-01-11
     */
    public function __construct() {
        parent::__construct();
        $this->_checkLogin();
    }

    /**
     * 判断是否登录
     * 如果没有登录跳转到登录页，已登录不做任何处理
     *
     * @author Eden
     * @date   2015-01-11
     */
    protected function _checkLogin() {
        if ( ! session('isLogin')) {
            // 如果用户没登录，检查该用户是不是保存有Cookie信息
            $this->_checkCookie();
        }
    }

    /**
     * 判断是否被Cookie保存了登陆信息
     * 如果用cookie登录了将信息赋值给SESSION
     *
     * @author  Eden
     * @data    2015-01-11
     */
    protected function _checkCookie () {

        // 用于比对用户发送过来的验证是否登录的状态码

        // 如果客户端发过来的COOKIE中的blue_symbol标识位与这里生成的标题相同
        // 则将客户端保存的COOKIE信息保存到SESSION中
        if (cookie('username')) {
            session('username', cookie('username'));
            session('isLogin', TRUE);
        } else {
            $this->redirect('User/login');
            exit;
        }
    }

    protected function _arr2ToArr1 ($arr2)
    {
        $array = array();
        foreach ($arr2 as $key=>$val)
        {
            $k = $val['cname'];
            $array[$k] = $val['cvalue'];
        }
        return $array;
    }
}