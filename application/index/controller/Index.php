<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {	
    	$cate = model('category');
      $cateres = $cate->catetree();
    	$this->assign('cateres', $cateres);
    	// 渲染模板输出
      return $this->fetch();
    }
}