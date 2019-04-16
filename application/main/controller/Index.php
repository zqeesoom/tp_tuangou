<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/9 0009
 * Time: 下午 8:46
 */
namespace app\main\controller;
use think\Controller;
class Index extends Controller{
    public function index(){

        return $this->fetch();
    }

}

