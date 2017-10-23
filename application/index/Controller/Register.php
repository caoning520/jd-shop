<?php
namespace app\index\controller;

use think\Controller;

class Register extends Controller
{
    public function index()
    {
       return $this->fetch();
    }

    //邮箱注册
    public function register()
	{
		$user = model('users');

		if (request()->isPost()) 
		{	
			$data = [
				'email' => input('post.email'),
				'password' => input('post.password'),
				'last_ip' => request()->ip(),
				'last_login' => time(),
				'nickname' => md5(input('post.email')),
				'phone' => '您还没绑定手机号码'
			];

			$validate = \think\Loader::validate('users');
			if(!$validate->check($data)) {
				$this->error($validate->getError());
			}

			$res = $user->doregister($data);

			if ($res){
	       	   	return  $this->success('注册成功','index/index');
	   		} else {
	        	return $this->error('注册失败','register/index');
			}
		}
	}

	//手机注册
	public function phone()
	{
		$user = model('users');

		if (request()->isPost()) 
		{
			$data = [
				'phone' => input('post.phone'),
				'password' => input('post.password'),
				'last_ip' => request()->ip(),
				'last_login' => time(),
				'nickname' => md5(input('post.email')),
				'email' => '您还没绑定邮箱'
			];
			$res = $user->dophone($data);

			if ($res){
	       	   	return  $this->success('注册成功','index/index');
	   		} else {
	        	return $this->error('注册失败','register/index');
			}
		}
	}

	//邮箱获取数据
	public function register1()
	{
		$email = input('post.email');
		$users = model('users');
		$res = $users->where('email',$email)->select();
		if ($res){
       	   	return 0;  //已有
   		} else {
        	return 1;  //没有
		}
	}

	//手机获取数据
	public function phone1()
	{
		$phone = input('post.phone');
		$users = model('users');
		$res = $users->where('phone',$phone)->select();
		if ($res){
       	   	return 0;  //已有
   		} else {
        	return 1;  //没有
		}
	}
}