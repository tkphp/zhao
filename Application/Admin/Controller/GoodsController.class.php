<?php
namespace Admin\Controller;

use Think\Controller;

/**
 *
 * @author Zhao
 *        
 */
class GoodsController extends MyController
{

   
     //构造函数，初始化

    public function __construct()
    {
        parent::__construct();
    }
    //商品列表
    public function index()
    {
        
        $goods = D("product"); // 实例化对象
        $count      = $goods->where()->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $good = $goods->where()->limit($Page->firstRow.','.$Page->listRows)->select();
        //$this->assign('cats', $cats);
        $this->assign('page',$show);// 赋值分页输出
        $this->assign("goods", $good);
        $this->display();
    }

    //商品添加页面
    public function add()
    {
        /* $cats = D('Admin/Cat')->selectform(); */
       // $cats=D('cat')->selectform('cat_id');
        // 将商品分类变量分配到模板
        //$this->assign('cats', $cats);
        $this->display();
    }
    //商品添加操作
    public function doAdd()
    {
        $post = $_POST;
        // 当商品名为空时，拒绝添加
         if (empty($post['name'])) {
            $this->error('商品添加失败');
            exit();
        }
        
        
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath  =      ''; // 设置附件上传目录 */
        // 上传文件
        $info   =   $upload->upload();
        
        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
            // 上传成功
            $img1='./Uploads/' .$info['img1']['savepath'].$info['img1']['savename'];
            $img2='./Uploads/' .$info['img2']['savepath'].$info['img2']['savename'];
            $img3='./Uploads/' .$info['img3']['savepath'].$info['img3']['savename'];
            $img4='./Uploads/' .$info['img4']['savepath'].$info['img4']['savename'];
            $image = new \Think\Image(); 
            $image->open($img1);
            $image->thumb(100, 100)->save('./Uploads/'.$info['img1']['savepath'].'th_'.$info['img1']['savename']);
            $image->open($img2);
            $image->thumb(100, 100)->save('./Uploads/'.$info['img2']['savepath'].'th_'.$info['img2']['savename']);
            $image->open($img3);
            $image->thumb(100, 100)->save('./Uploads/'.$info['img3']['savepath'].'th_'.$info['img3']['savename']);
            $image->open($img4);
            $image->thumb(100, 100)->save('./Uploads/'.$info['img4']['savepath'].'th_'.$info['img4']['savename']);
            $this->success('上传成功！');
        } 
        $post['img']=$info['img']['savepath'].$info['img']['savename'];
        $post['img1']=$info['img1']['savepath'].$info['img1']['savename'];
        $post['img2']=$info['img2']['savepath'].$info['img2']['savename'];
        $post['img3']=$info['img3']['savepath'].$info['img3']['savename'];
        $post['img4']=$info['img4']['savepath'].$info['img4']['savename'];
        $getProductId = M('product')->add($post);
        if (! $getProductId) {
            $this->error('商品添加失败');
            exit();
        }
        //header("Location:" . U('Goods/lists'));
        $this->redirect('Goods/index'); 
       
    }


    public function edit(){
        //$getId = I('get.id');
        $id = I("id", 0, 'int');
        // 获取产品详细信息
        $goods=M("product")->find($id);
        
       // $cats=D('cat')->selectform('cat_id', $goods['cat_id']);

        // 将商品分类变量分配到模板
        //$this->assign('cats', $cats);
         $this->assign('good', $goods);
        $this->display();
    }

   
    // 执行商品修改操作
    public function doEdit()
    {
        $Id = $_POST['id'];
        $post = $_POST;
    
        if (empty($post['name'])) {
            $this->error('商品更改无效');
            exit;
        }
       
        
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath  =      ''; // 设置附件上传目录
        // 上传文件
        $info   =   $upload->upload();
        
        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
            // 上传成功
            $img1='./Uploads/' .$info['img1']['savepath'].$info['img1']['savename'];
            $img2='./Uploads/' .$info['img2']['savepath'].$info['img2']['savename'];
            $img3='./Uploads/' .$info['img3']['savepath'].$info['img3']['savename'];
            $img4='./Uploads/' .$info['img4']['savepath'].$info['img4']['savename'];
            $image = new \Think\Image(); 
            $image->open($img1);
            $image->thumb(100, 100)->save('./Uploads/'.$info['img1']['savepath'].'th_'.$info['img1']['savename']);
            $image->open($img2);
            $image->thumb(100, 100)->save('./Uploads/'.$info['img2']['savepath'].'th_'.$info['img2']['savename']);
            $image->open($img3);
            $image->thumb(100, 100)->save('./Uploads/'.$info['img3']['savepath'].'th_'.$info['img3']['savename']);
            $image->open($img4);
            $image->thumb(100, 100)->save('./Uploads/'.$info['img4']['savepath'].'th_'.$info['img4']['savename']);
            $this->success('上传成功！');
        } 
        $post['img']=$info['img']['savepath'].$info['img']['savename'];
        $post['img1']=$info['img1']['savepath'].$info['img1']['savename'];
        $post['img2']=$info['img2']['savepath'].$info['img2']['savename'];
        $post['img3']=$info['img3']['savepath'].$info['img3']['savename'];
        $post['img4']=$info['img4']['savepath'].$info['img4']['savename'];
        $getProductId = M('product')->add($post);
        if (! $getProductId) {
            $this->error('商品添加失败');
            exit();
        }
        //header("Location:" . U('Goods/lists'));
        $this->redirect('Goods/index'); 
    }
    
    //商品删除
    public function delete()
    {
         
         $id = !empty($_POST['id']) ? $_POST['id'] : $_GET['id'];
           //var_dump($id);
         $id = I("id", 0, 'int');
        
         $good= M("product");
         $path=$good->where($id)->find();
         unlink('./Uploads/'.$path["img"]);
         unlink('./Uploads/'.$path["img1"]);
         unlink('./Uploads/'.$path["img2"]);
         unlink('./Uploads/'.$path["img3"]);
         unlink('./Uploads/'.$path["img4"]);
         $good->where("id=$id")->delete();

         $this->redirect('Goods/index'); 
         }
}