<?php
namespace app\admin\controller;
use think\Controller;
class Api extends Base
{
	private  $obj;
    public function _initialize() {
        $this->obj = model("region");
    }

    //获取城市/街道逻辑
    public function getCityById() {
        $id = input('post.id');
        // 通过id获取城市/街道
        $citys = $this->obj->getRegionByParentId($id);
        if(!$citys) {
            return 0;
        }
        return $this->show(1,'success', $citys);
    }

    public function show($status, $message='' , $data=[]) {
	    return [
	        'status' => intval($status),
	        'message' => $message,
	        'data' => $data,
	    ];
	}

}