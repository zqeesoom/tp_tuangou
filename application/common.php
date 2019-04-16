<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function getTree($arr,$pid=0,$levle=1){

    static $newArr = [];
    foreach($arr as $v){

        if($v['parent_id']==$pid){

            $v['level'] = $levle;
            $newArr[] = $v;
            getTree($arr,$v['id'],$levle+1);
        }
    }
    return $newArr;
}