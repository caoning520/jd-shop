<?php
namespace app\common\model;
use traits\model\SoftDelete;
use think\Model;
use think\Db;
class Category extends Model
{
    use SoftDelete;
    protected $deleteTime = 'delete_time';
    protected  $autoWriteTimestamp = true;

    public function add($data) {
        $data['status'] = 1;
        $result =  $this->save($data);
        // echo $this->getLastSql();die;
        return $result;
    }

    /**
     * 获取顶级分类
     */
    public function getFirstCategorys($parentId = 0) {
        $data = [
            'parent_id' => $parentId,
        ];

        $order =[
            'sort_order' => 'desc',
            'id' => 'desc',
        ];
        $result = $this->where($data)
                        ->order($order)
                        ->paginate(3);
        //echo $this->getLastSql();

        return $result;
    }

    /**
     * 获取所有状态正常的一级分类
     */
    public function getNormalFirstCategory() {
        $data = [
            'status' => 1,
            'parent_id' => 0,
        ];

        $order = [
            'id' => 'desc',
        ];

        return $this->where($data)
            ->order($order)
            ->select();
    }

    //无限级分类
    public function catetree()
    {
        $cateres = $this->select();
        return $this->sort($cateres);
    }

    public function sort($data, $pid=0, $level=0)
    {
        static $arr = [];
        foreach ($data as $key => $value) {
            if ($value['parent_id'] == $pid) {
                $value['level'] = $level;
                $arr[] = $value;
                $this->sort($data, $value['id'], $level+1);
            }

        }
        return $arr;    
    }

    public function getchildrenids($id)
    {
        $res = $this->select();
        return $this->_getchildrenids($res, $id);
    }
    public function _getchildrenids($res, $id)
    {
        static $arr = [];
        foreach ($res as $key => $value) {
            if ($value['parent_id'] == $id) {
                $arr[] = $value['id'];
                $this->_getchildrenids($res, $value['id']);
            }
        }
        return $arr;
    }
}