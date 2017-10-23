<?php
namespace app\index\controller;

use think\Controller;

class Login extends Controller
{
    public function index()
    {
       return $this->fetch();
    }

    //邮箱登录
  	public function login()
    {
    	$user = model('users');

    	if (request()->isPost()) 
		{
			$data = [
				'email' => input('post.email'),
				'password' => input('post.password'),
				'last_ip' => request()->ip(),
				'last_login' => time(),
			];
			$res = $user->dologin($data);

			if ($res){
	       	   	return  $this->success('登录成功','index/index');
	   		} else {
	        	return $this->error('登录失败','login/index');
			}
		}
    }
}