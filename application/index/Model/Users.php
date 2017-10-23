<?php
namespace app\index\model;

use think\Model;
use think\Db;
use think\Validate;

class Users extends Model
{	
	public function doregister($data)
	{	
		return model('users')->insert($data);
	}

	public function dophone($data)
	{
		return model('users')->insert($data);
	}

	public function dologin($data)
	{	
		return model('users')->select($data);
	}
}