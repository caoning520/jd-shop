<?php
namespace app\index\controller;

use think\Controller;

class Person extends Controller
{
    public function index()
    {
       return $this->fetch();
    }

    //个人信息
    public function information()
    {
       return $this->fetch();
    }

    //安全设置
    public function safety()
    {
       return $this->fetch();
    }

    //修改密码
    public function password()
    {
       return $this->fetch();
    }

    //支付密码
    public function setpay()
    {
       return $this->fetch();
    }

    //手机绑定
    public function bindphone()
    {
       return $this->fetch();
    }

    //邮箱换绑
    public function email()
    {
       return $this->fetch();
    }

    //实名认证
    public function idcard()
    {
       return $this->fetch();
    }

    //安全问题
    public function question()
    {
       return $this->fetch();
    }

    //地址管理
    public function address()
    {
       return $this->fetch();
    }

    //快捷支付
    public function cardlist()
    {
       return $this->fetch();
    }

    //添加银行卡
    public function cardmethod()
    {
       return $this->fetch();
    }

    //订单管理
    public function order()
    {
       return $this->fetch();
    }

    //退款售后
    public function change()
    {
       return $this->fetch();
    }

    //钱款去向
    public function record()
    {
       return $this->fetch();
    }

    //评价商品
    public function comment()
    {
       return $this->fetch();
    }

    //我的积分
    public function points()
    {
       return $this->fetch();
    }

    //优惠卷
    public function coupon()
    {
       return $this->fetch();
    }

    //账户余额
    public function walletlist()
    {
       return $this->fetch();
    }

    //账单明细
    public function bill()
    {
       return $this->fetch();
    }

    //明细
    public function billlist()
    {
       return $this->fetch();
    }

    //收藏
    public function collection()
    {
       return $this->fetch();
    }

    //足迹
    public function foot()
    {
       return $this->fetch();
    }

    //订单详情
    public function orderinfo()
    {
       return $this->fetch();
    }
}