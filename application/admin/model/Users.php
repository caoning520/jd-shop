<?php
namespace app\admin\model;
use think\Model;
use traits\model\SoftDelete;
class Users extends Model
{
	use SoftDelete;
    protected $deleteTime = 'delete_time';
	public function index()
	{
		
	}

	
}