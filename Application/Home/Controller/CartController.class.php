<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
 public function index(){
        
        if(session('is_Login')){
            $user_id = session('userid');
            $cart = M('cart')->where($user_id)->select();
            foreach ($cart as $key => $val){
                $Price += $val['price'];
            }
            $Num  = count($cart);
            $this->assign("cart",$cart);
            $this->assign("Num",$Num);
            $this->assign("Price",$Price);
        }else{
            /* $procart = new \Think\Cart();
            $Num = $procart->getNum();
            $Price=$procart->getPrice();
            $this->assign("Num",$Num);
            $this->assign("Price",$Price);
            
            $cart = $_SESSION['cart'];
            $this->assign("cart",$cart); */
            $this->redirect('User/index');
        }
    
        $this->display();  
    }
    
    public function add(){
        $id = I('post.id',0,'int');
        $num= I('post.num',0,'int');
        $pro = M("product");
      
        $data=$pro->where("id=%d",$id)->select();
        $name=$data[0]['name'];
        $price=$data[0]['price']; 
        $img = $data[0]['img'];
        if(session('is_Login')){
            $map['product_id'] = $id;
            $exist = M('cart')->where($map)->find();
            if($exist){
                $this->error("商品已存在购物车！！！");
            }else {
            $arr['user_id'] = session('userid');
            $arr['product_id'] = $id;
            $arr['img'] = $img;
            $arr['name'] = $name;
            $arr['price'] = $price;
            $arr['num'] = $num;
            
            $cart = M('cart')->add($arr);
            $this->redirect('Index/index');
            }
        }else{
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['num'] += $num;
                $this->redirect('Index/index');
                //return;
            }
            $item = array();
            $item['id'] = $id;
            $item['name'] = $name;
            $item['price'] = $price;
            $item['num'] = $num;
            $item['img'] = $img;
            $_SESSION['cart'][$id] = $item;
            $this->redirect('Index/index'); 
        }
        
       
    }
    
    public function delete() {
        if(session('is_Login')){
            $id = I('post.id');
            $cart = M('cart');
            $cart->where("id=$id")->delete();
            $this->redirect('Index/index');
        }else {
            $id = I('post.id');
            $cart = new \Think\Cart();
            $cart->delItem($id);
            $this->redirect('Index/index');
        }
       
    }
    
    /*
         清空购物车
     */
    public function clear() {
        $cart = new \Think\Cart();
        $cart->clear();
    }
    
    public function order(){
        foreach ($_POST as $key => $val){
            $address.=$val;
        }
        $uid = session('userid');
        $cart = M('cart')->where($uid)->select();
        
        foreach ($cart as $key => $val){
            $Price += $val['price']*$val['num'];
        }
        $data['user_id'] = $uid;
        $data['order_sn']= random(8,1);
        $data['order_date'] = time();
        $data['deal_price'] = $Price;
        $data['addr'] = $address;
        
        $oid = M('order')->add($data);
        
        if($oid){
            foreach ($cart as $key => $val){
                $arr['order_id'] = $oid;
                $arr['product_id'] = $val['id'];
                $arr['price'] = $val['price'];
                $arr['num'] = $val['num'];
                $arr['name'] = $val['name'];
                $arr['img'] = $val['img'];
                $ok = M('order_products')->add($arr);
                if($ok){
                    M('cart')->where($uid)->delete();
                }
            }
        } 
        $this->redirect('User/person');
    }
    
    public function test(){
        var_dump($_SESSION['cart']);
    }
}