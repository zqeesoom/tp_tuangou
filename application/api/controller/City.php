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
use app\common\model\City as Cit;

//城市管理api
class City extends Controller
{

    public function getCity() {

        $pid = Request::param('id');
        //实例化城市模型
        $city = new Cit();
        $citys = $city->getFirstCategory($pid)->toArray();
        return json(['status'=>1,'data'=>$citys]);
    }
}