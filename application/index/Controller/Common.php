<?php
namespace app\index\controller;

use think\Controller;

class Common extends Controller
{	
    public function index()
    {	
       session('email', "input('post.email')");
       return $this->fetch();
    }
}