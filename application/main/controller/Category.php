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


//生活服务分类业务逻辑
class Category extends Controller{

    //实例化模型
    private $obj;
    public function initialize(){
        $this->obj = new \app\common\model\Category;
    }



    //显示生活服务分类列表
    public function index(){

        //获取顶级的分类数据
        $categorys = $this->obj->getFirstCategory()->toArray();

        //模板赋值
        $this->assign('categorys',$categorys);
        return $this->fetch();

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
        $this->assign("categorys",$categorys);
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
}