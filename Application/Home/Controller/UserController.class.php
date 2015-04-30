<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){    
            $this->display();
    }
    //发送邮件
    public function add(){

    }
    //邮箱验证码
    public function code()
    {
        $config = array(
            'imageW' => 160,
            'imageH' => 40,
            'length' => 4,
            'fontSize' => 20,
        );
        $code = new \Think\Verify($config);
        $code->entry();
    }
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = '')
    {    
        $verify = new \Think\Verify();    
        return $verify->check($code, $id);
    }
    //注册界面
    public function register(){
        $this->display();
    }
    //邮箱注册操作
    public function doEmailRegister(){

			$password = I('post.password');
			$code = I('post.mobile_code');
			$verify = new \Think\Verify();
			if($verify->check($code)){
			    
			
			$data['email'] = I('post.mobile');
			
			$data['uname']			 = 'ZH' . substr(md5(time()), 0, 5);
			$data['password']		 = sha1($password);
			$data['create_time']	 = time();
			$data['last_login_time'] = time();
			$data['last_login_ip']	 = get_client_ip();
			$data['active_code']	 = md5($data['create_time'] . md5($password));
			
			$User = M('user');
			if ($User->create($data))
			{
			    $UserId = $User->add();
			    $title= '亲爱的用户'.$data['email'].'<br>'.'这是一封注册认证的邮件，请点击以下链接确认'.'<br>';
			    $url = 'http://' . I('server.HTTP_HOST') . '/' . 'zhao/Home/User/verifyEmail/id/' . $UserId . '/active_code/' . $data['active_code'].'<br>';
			    $url		='<a href="' . $url .'">' . $url . '</a>';
			    $end ='如果链接不能点击，请复制以上地址到浏览器，然后直接打开'.'<br>'.'上述链接48小时内有效。如果激活链接失效，请您登录网站重新申请认证。'.'<br>'.date('Y年m月d日');
			    $content=$title.$url.$end;
			    if(SendMail($data['email'],"邮箱注册认证",$content))
			        $this->success('请登录邮箱激活您的账户！','Index/index');
			    else
			        $this->error('发送失败');
			    
			} 
			}else{
			    $this->error("验证码错误");
			}
    }

     //用户邮箱验证
    public function verifyEmail()
    {
    
        $userId = I('get.id');
        $userActiveCode = I('get.active_code');
    
        if (empty($userId))
        {
            $this->error('非法操作');
            exit;
        }
    
        $User = M('user');
        $userInfo = $User->field(' email_state, active_code')->find($userId);
    
        
        if ( $userActiveCode == $userInfo['active_code'])
        {
            	
            if ($User->where("id={$userId}")->save(array('email_state'=>1)))
            {
                $this->redirect('Index/index');
                
            }
            	
        }
        else
        {
            $this->error('邮件验证失败');
        }
    }
    
    protected function _checkUserLogin ($username, $password)
    {
        $User = M('user');
        $password = sha1($password);
        $where = "(mobile = '{$username}' AND password = '{$password}' AND mobile_state=1 AND status=1) OR (email = '{$username}' AND password = '{$password}' AND email_state=1 AND status=1)";
    
        $userInfo = $User->where($where)->find();
    
        return empty ($userInfo) ? NULL : $userInfo;
    }

     // 登录用户保存SESSION信息
    protected function _saveSession($userId, $userName)
    {
        session('username', $userName);
        session('userid', $userId);
        session('is_Login',1);
    }
     //登录界面登录处理
    public function doLogin()
    {
        $username = I('post.username');
        $password = I('post.password');
        
        // 验证用户是否存在
        if ( ! $userInfo = $this->_checkUserLogin($username, $password))
        {
            $this->error('用户名或密码错误', 'index');
            exit;
        }
    
        // 保存SESSION
        $this->_saveSession($userInfo['id'], $userInfo['uname']);
        $this->redirect('User/person');
    }
    
    //手机注册操作
    public function doTelRegister(){
        if($_POST){
            if($_POST['mobile']!=$_SESSION['mobile'] or $_POST['mobile_code']!=$_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])){
                $this->error('手机验证码输入错误。');
            }else{
                
                
                $password = I('post.password');
                
                $data['mobile'] = I('post.mobile');
                $data['mobile_state'] = 1;
                
                $User = M('user');
                
                // 插入用户登录表
                $data['uname']			 = 'ZH' . substr(md5(time()), 0, 5);
                $data['password']  		 = sha1($password);
                $data['create_time']     = time();
                $data['last_login_time'] = time();
                $data['last_login_ip']   = get_client_ip();
                
                if ($User->create($data))
                {
                    $getUserId = $User->add();
                    if ($getUserId)
                    {
                            $_SESSION['mobile'] = '';
                            $_SESSION['mobile_code'] = '';
                             $this->redirect('User/index');
                    }
                }
              
            }
        }
    }
    
    //发送手机验证码
    public function test(){
        $target = "http://106.ihuyi.cn/webservice/sms.php?method=Submit";
    
        $mobile = $_POST['mobile'];
    
    
        $mobile_code = random(4,1);
        if(empty($mobile)){
            exit('手机号码不能为空');
        }
    
        $post_data = "account=cf_zhaobei&password=zb120208&mobile=".$mobile."&content=".rawurlencode("您的验证码是：".$mobile_code."。请不要把验证码泄露给其他人。");
        //密码可以使用明文密码或使用32位MD5加密
        $gets =  xml_to_array(Post($post_data, $target));
        if($gets['SubmitResult']['code']==2){
            $_SESSION['mobile'] = $mobile;
            $_SESSION['mobile_code'] = $mobile_code;
        }
        echo $gets['SubmitResult']['msg'];
    }
    
    //退出登录
    public function logout()
    {
        session('is_Login', NULL);
        session('username', NULL);
        session('password', NULL);
        session('cart',     NULL);
        $this->redirect('Index/index');

    }
    //是否已注册
    public function chk(){
        $mobile = $_POST['mobile'];
		$User = M('user');
		$mobileExists = $User->where("email = '{$mobile}' or mobile = '{$mobile}'")->find();
		if ($mobileExists)
		{
			$data=true;
		}
		else
		{
			$data=false;
		}
        
        $this->ajaxReturn($data);
    }
    
    public function person(){
        $user_id = session('userid');
        foreach ($_SESSION['cart'] as $value)
        {
            $arr['user_id'] = session('userid');
            $arr['product_id'] = $value['id'];
            $arr['img'] = $value['img'];
            $arr['name'] = $value['name'];
            $arr['price'] = $value['price'];
            $arr['num'] = $value['num'];
            $pid = $value['id'];
            $ex = M('cart')->where($pid)->find();
            if($ex){
                break;
            }else{
                $cart = M('cart')->add($arr);
            }     
        }
            $map['user_id'] = session('userid');
            $cart = M('cart')->where($map)->select();
            foreach ($cart as $key => $val){
                $Price += $val['price']*$val['num'];
            }
            $Num  = count($cart);
            $this->assign("cart",$cart);
            $this->assign("Num",$Num);
            $this->assign("Price",$Price);  
        
        $person = M('user')->where($user_id)->find();
        $this->assign("person",$person);
        //var_dump($person);
        //订单
        
        $orders = D("order"); // 实例化对象
        $count      = $orders->where()->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $order = $orders->where()->limit($Page->firstRow.','.$Page->listRows)->select();
        //$this->assign('cats', $cats);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign("orders", $order);
        
        $this->display();
    }
    
    public function personEdit(){
        $id = I('post.id');
        $password = I('post.password');
        $data['uname'] = I('post.username');
        $data['password'] = sha1($password);
        $data['email'] = I('post.useremail');
        $data['mobile'] = I('post.userphone');
        $UserId = M('user')->where($id)->save($data);
        if($UserId){
            $this->success("保存成功");
            session('username', $data['uname']);
        }else {
            $this->error("修改失败");
        }
    }
    //用户协议
    public function agree(){
        $this->display();
    }
    //忘记密码
    public function forget(){
        $this->display();
    }
    
    //邮箱修改密码操作
    public function doEmailChange(){
    
        $password = I('post.password');
        $code = I('post.mobile_code');
        $verify = new \Think\Verify();
        if($verify->check($code)){
             
            	
            $map['email'] = I('post.mobile','',FILTER_VALIDATE_EMAIL);
            $User = M('user');
            $tent = $User->where($map)->find();
            $id = $tent['id'];
            $data['email']           = $tent['email'];
            $data['password']		 = sha1($password);
            $data['last_login_time'] = time();
            $data['active_code']	 = md5($data['last_login_time'] . md5($password));
            $data['email_state']     = 0;
            $User = M('user');
            $UserId = $User->where($id)->save($data);
            $title= '亲爱的用户'.$data['email'].'<br>'.'这是一封修改密码认证的邮件，请点击以下链接确认'.'<br>';
            $url = 'http://' . I('server.HTTP_HOST') . '/' . 'zhao/Home/User/verifyEmailc/id/' . $id . '/active_code/' . $data['active_code'].'<br>';
            $url		='<a href="' . $url .'">' . $url . '</a>';
            $end ='如果链接不能点击，请复制以上地址到浏览器，然后直接打开'.'<br>'.'上述链接48小时内有效。如果激活链接失效，请您登录网站重新申请认证。'.'<br>'.date('Y年m月d日');
            $content=$title.$url.$end;
            if(SendMail($data['email'],"邮箱认证",$content))
                $this->redirect('User/index');
            else
                $this->error('发送失败'); 
        }else{
            $this->error("验证码错误");
        } 
    }
    
    //用户邮箱验证
    public function verifyEmailc()
    {
    
        $userId = I('get.id');
        $userActiveCode = I('get.active_code');
    
        if (empty($userId))
        {
            $this->error('非法操作');
            exit;
        }
    
        $User = M('user');
        $userInfo = $User->field(' email_state, active_code')->find($userId);
    
    
        if ( $userActiveCode == $userInfo['active_code'])
        {
             
            if ($User->where("id={$userId}")->save(array('email_state'=>1)))
            {
                $this->redirect('User/index');
    
            }
             
        }
        else
        {
            $this->error('邮件修改密码失败');
        }
    }
    
    //手机修改密码操作
    public function doTelChange(){
        if($_POST){
            if($_POST['mobile']!=$_SESSION['mobile'] or $_POST['mobile_code']!=$_SESSION['mobile_code'] or empty($_POST['mobile']) or empty($_POST['mobile_code'])){
                $this->error('手机验证码输入错误。');
            }else{
    
    
                $password = I('post.password');
    
                $map['mobile'] = I('post.mobile');
                //$tent = $User->where($map)->find();
                $User = M('user');
    
                // 插入用户登录表
                $data['password']  		 = sha1($password);
                $data['last_login_time'] = time();
                $data['last_login_ip']   = get_client_ip();
    
                $getUserId = $User->where($map)->save($data);
                if ($getUserId)
                {
                    $_SESSION['mobile'] = '';
                    $_SESSION['mobile_code'] = '';
                    $this->success('密码修改成功','User/index');
                }
               
    
            }
        }
    }
    
}

