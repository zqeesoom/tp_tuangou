<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/20 0020
 * Time: 下午 11:33
 */
namespace app\api\controller;

use think\Controller;
use Request;
use app\common\model\Category as Cate;

//城市管理api
class Category extends Controller
{

    public function getCagtegory() {

        $pid = Request::param('id');
        //实例化生活服务模型
        $city = new Cate();
        $citys = $city->getFirstCategory($pid)->toArray();
        return json(['status'=>1,'data'=>$citys]);
    }
}