<?php
namespace app\admin\validate;
use think\Validate;
class Category extends Validate
{
	protected $rule = [
		['id', 'number'],
		['cate_name', 'require|max:12', '分类名称不能为空|名称过长'],
		['parent_id', 'require|number', '必须选择所属栏目|参数不合法'],
		['status', 'number|in:0,1','状态传递必须为数字|状态传递不合法'],
	];

	// 设置不同的验证场景（搜索验证场景）
    protected  $scene = [
        'add' => [ 'id'],
        'status' => ['id', 'status']
    ];
} 
