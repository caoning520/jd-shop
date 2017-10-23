<?php
namespace app\common\model;

use think\Model;
class Region extends Model
{
    //这个是可以复用的方法，省份，城市和街道都可以调用
	public function getRegionByParentId($parentId = 0)
	{
		$data = [
		        'parent_id' => $parentId,
       		];

	    $order = [
	    		'id' => 'desc',
	    	];

	    return $this->where($data)
	    ->order($order)
	    ->select();
	}
	
	
}