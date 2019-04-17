<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/15 0015
 * Time: 下午 10:08
 */

namespace app\common\model;
use think\Model;
use think\model\concern\SoftDelete;//引入软删除除

class Category extends Model
{
    //开启自动写入时间搓
    protected $autoWriteTimestamp = true;
    //设置软删除字段
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    //标记0代表删除。
    protected $defaultSoftDelete = 0;

    //添加数据
    public function add($data){

        $data['status'] = 1;
        self::create($data);
        return true;
    }

    //获取分类列表
    public function getFirstCategory($id = 0){

        return self::where('parent_id',$id)->select();

    }
    //获取所有层级的分类数据
    public function getTreeCategory(){

        $data = self::select()->toArray();
        return getTree($data);

    }

    //更新状态
    public function updateStatus($id,$status){

        $rows = self::where('id',$id)->update(['status'=>$status]);
        if($rows!==false){
            return true;
        }
        return false;
    }


}