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


//图片上传
class Image extends Controller
{

    public function upload() {

        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        // 移动到框架应用根目录/uploads/ 目录下
        $info = $file->move( '../uploads');
        if($info){
            // 成功上传后 获取上传信息

            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            $path =  $info->getSaveName();
            return json(['path'=>'/'.$path]);

        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
}