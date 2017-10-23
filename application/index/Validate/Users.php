<?php
namespace app\index\validate;

use think\Validate;

class Users extends Validate
{
	protected $rule = [
		'password' => 'require|min:6',
		'email' => 'require',
		'phone' => 'require',
	];

	protected $message = [
		'password.require' => '密码不得为空!',
		'password.min' => '密码不得少于6位!',
		'email.require' => '邮箱不得为空',
		'phone.require' => '手机号不得为空',
	];
}