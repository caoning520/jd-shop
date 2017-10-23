<?php
namespace app\admin\controller;
use think\Controller;
class Category extends Base
{
	protected $beforeActionList = [
        'delsoncate'  =>  ['only'=>'cate_del'],
    ];
	private  $obj;
    public function _initialize() {
        $this->obj = model("Category");
    }

	public function index()
	{
        $categorys = $this->obj->catetree();
        // var_dump($categorys);die;
        return $this->fetch('',[
            'categorys'=>$categorys,
        ]);
	}

	//添加分类
	public function cate_add()
	{
		$categorys = $this->obj->catetree();
        return $this->fetch('', [
            'categorys'=> $categorys,
        ]);
	}

	public function cate_save()
	{
		if (!request()->isPost()) {
			$this->error('请求不合法');
		}
		$data = input('post.');
		// var_dump($data);die;
		$validate = validate('Category');
		if(!$validate->scene('add')->check($data))
		{
			$this->error($validate->getError());
		}

		if (!empty($data['id'])) {
			$edit_res = $this->obj->save(['cate_name'=>$data['cate_name'],'parent_id'=>$data['parent_id']], ['id'=>$data['id']]);
			if ($edit_res) {
				return 1;
			}else{
				return 0;
			}
		}

		$res = $this->obj->add($data);
		if ($res) {
			$this->success('添加成功');
		}else{
			$this->error($this->obj->getError());
		}

	}

	//修改状态
	public function status()
	{
		$data = input('get.');
		$validate = validate('Category');
		if(!$validate->scene('status')->check($data))
		{
			$this->error($validate->getError());
		}

		$res = $this->obj->save([ 'status'  => $data['status']],['id' => $data['id']]);
		if ($res) {
			$this->success('状态更新成功');
		}else{
			$this->error('状态更新失败');
		}
	}

	//编辑分类
	public function cate_edit($id=0)
	{
		$id = input('get.id');
		$category = $this->obj->where('id',$id)->find(); 
		$categorys = $this->obj->catetree();
        return $this->fetch('', [
            'categorys'=> $categorys,
            'category'=>$category
        ]);
	}

	//删除分类
	public function cate_del()
	{
		$id = input('get.id');
		$res = $this->obj->destroy($id);
		if ($res) {
			return 1;
		}else{
			return 0;
		}
	}

	public function delsoncate()
	{
		// var_dump(input('get.id'));die;

		$sonids = $this->obj->getchildrenids(input('get.id'));
		if ($sonids) {
			$this->obj->destroy($sonids);
		}
	}

	
}