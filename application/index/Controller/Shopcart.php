<?php
namespace app\index\controller;

use think\Controller;

class Shopcart extends Controller
{	
	//购物车
	public function shopcart()
    {
       return $this->fetch();
    }

    //结算
    public function pay()
    {
       return $this->fetch();
    }

    //提交订单
    public function sub()
    {
       return $this->fetch();
    }
}