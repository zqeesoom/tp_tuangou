<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/14 0014
 * Time: 下午 4:09
 */
namespace app\main\controller;
use think\Controller;
//引入请求类
use Request;
//引入数据验证类
use app\main\validate\CategoryVali;


//城市分类
class City extends Controller{

    //实例化模型
    private $obj;
    public function initialize(){
        $this->obj = new \app\common\model\City;
    }



    //显示城市分类列表
    public function index(){
        //获取顶级的分类数据
        $categorys = $this->obj->getFirstCategory(0,true);
        //获取分页显示
        $page = $categorys->render();

        //模板赋值
        $this->assign(['categorys'=>$categorys,
                'page'=>$page
            ]);
        //echo"<pre>";
        //var_dump($categorys);
        return $this->fetch();

    }
    //编辑分类
    public function edit(){
        if (Request::isPost()) {
            $data = Request::param();
            //实例化验证器
            $categoryVali = new CategoryVali();
            if($categoryVali->check($data)){
                $res = $this->obj->updateCategory($data);
                if ( $res !== false ) {
                    $this->success('更新成功','index');
                }else{

                    $this->error("更新失败");
                }

            }
        }
        //获取当前要修改的分类
        $cid = Request::param('id');
        $category = $this->obj->getCategoryById($cid);
        //获取所有层级的分类数据
        $categorys = $this->obj->getTreeCategory();
        $this->assign([
            'categorys'=>$categorys,
            'category' =>$category
        ]);
       return  $this->fetch();
    }
    //添加分类
    public function add(){

        if(Request::isPost()){
            $data = Request::param();
            //实例化验证器
            $categoryVali = new CategoryVali();
            if($categoryVali->check($data)){
                if($this->obj->add($data))
                    $this->success('添加成功','index');
            }
        }

        //获取所有层级的分类数据
        $categorys = $this->obj->getTreeCategory();
        $this->assign("categorys",$categorys);
        return $this->fetch();
    }

    //获取子类列表
    public function getSubCategory(){

        //获取父级ID
        $parentId = Request::param('parent_id');
        $categorys =$this->obj->getFirstCategory($parentId)->toArray();

        //模板赋值
        $this->assign(["categorys"=>$categorys,

            'page'=>0//分类的子类不分页

        ]);
        return $this->fetch('index');

    }

    //修改状态
    public function setStatus(){

        $id = Request::param('id');
        $status = Request::param('status');
        $res = $this->obj->updateStatus($id,$status);
        if($res){
            $this->redirect(url('index'));
        }
        $this->error('修改失败');
    }

    //删除
    public function softDelData(){
       $id =  Request::param('id');
       $res = $this->obj->softDelById($id);
       if($res){
           $this->success('删除成功','index');
        }
        $this->error('删除失败');
    }

    //修改排序
    public function setListOrder(){

        $id = Request::param('id');
        $val = Request::param('val');

        $res = $this->obj->setListOrder($id,$val);
        if($res){
            echo '排序修改成功';
        }else{
            echo '排序修改失败';
        }
    }
}