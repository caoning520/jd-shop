<?php
namespace app\index\model;

use think\Model;
use think\Db;
use think\Validate;

class Category extends Model
{	
	public function catetree()
	{
		$cateres = $this->select();
		return $this->sort($cateres);
	}

	public function sort($data,$parent_id=0,$level=0) {
		static $arr = array();
		foreach ($data as $key => $value) {
			if ($value['parent_id'] == $parent_id) {
				$value['level'] = $level;
				$arr[] = $value;
				$this->sort($data,$value['id'],$level+1);
			}
		}
		return $arr;
	}
}