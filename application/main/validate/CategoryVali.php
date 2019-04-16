<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/15 0015
 * Time: 下午 9:55
 */

namespace app\main\validate;
use think\Validate;

class CategoryVali extends Validate
{
    //验证规则
    protected $rule = [
        //require 必须填写
        "name" => "require|max:25",
    ];

    //提示信息
    protected $message = [
        "name.require" => "名称不能为空",
        "name.max" => "名称的长度不能大于25",
    ];
}