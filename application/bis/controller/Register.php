<?php

namespace app\bis\controller;

use think\Controller;
use app\common\model\City;
use app\common\model\Category;

/**
 * 商户入驻
 * @package app\main\controller
 */
class Register extends Controller
{
    public function index()
    {
        //获取省数据
        $city = new City();
        $province = $city->getFirstCategory();

        //获取分类数据
        $category = new Category();
        $categorys = $category->getFirstCategory();

        //模板赋值
        $this->assign([
            "province" => $province,
            "categorys" => $categorys
        ]);
        return $this->fetch();
    }
}