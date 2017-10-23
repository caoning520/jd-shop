<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function msg($to, $code)
{
	//初始化必填
	$options['accountsid']='402b83fd86d622949eabab546ad51f0f';
	$options['token']='303faebb869fd5e06d7258e361d4fb4d';


	//初始化 $options必填
	$ucpass = new Ucpaas($options);

	//开发者账号信息查询默认为json或xml
	header("Content-Type:text/html;charset=utf-8");

	//短信验证码（模板短信）,默认以65个汉字（同65个英文）为一条（可容纳字数受您应用名称占用字符影响），超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。
	$appId = "ba21b76f8d1e4f71b55e3ca950c7d943";
	$to = $to;
	$templateId = "183142";
	$param=$code;

	return $ucpass->templateSMS($appId,$to,$templateId,$param);
}

function status($status) {
    if($status == 1) {
        $str = "<span class='label label-success radius'>正常</span>";
    }elseif($status ==0) {
        $str = "<span class='label label-warning radius'>待审</span>";
    }else {
        $str = "<span class='label label-danger radius'>删除</span>";
    }
    return $str;
}