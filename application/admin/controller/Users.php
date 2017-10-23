<?php
namespace app\admin\controller;
use think\Controller;

class Users extends Base
{
	public function index()
	{
		// 查询状态为1的用户数据 并且每页显示10条数据
		$list = model('users')->paginate(1);
		// 把分页数据赋值给模板变量list
		$this->assign('list', $list);
		// 渲染模板输出
		return $this->fetch();
	}

	public function add()
	{
		return $this->fetch();
	}
}