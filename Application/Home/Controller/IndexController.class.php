<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

       
        
        if(session('is_Login')){
       
            $map['user_id'] = session('userid');
            $cart = M('cart')->where($map)->select();
            foreach ($cart as $key => $val){
                $Price += $val['price']*$val['num'];
            }
            $Num  = count($cart);
            $this->assign("cart",$cart);
            $this->assign("Num",$Num);
            $this->assign("Price",$Price);  
            
            
        }else{
            $procart = new \Think\Cart();
            $Num = $procart->getNum();
            $Price=$procart->getPrice();
            $this->assign("Num",$Num);
            $this->assign("Price",$Price);
            
            $cart = $_SESSION['cart'];
            $this->assign("cart",$cart);
        }
    
        
        
        
        
        
         $pro = D("product")->limit(3)->select();  
        $this->assign("pro", $pro); 
        $this->display();    
    }
}