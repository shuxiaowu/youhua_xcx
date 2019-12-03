<?php
namespace app\admin\model;

use think\Model;

class FormData extends Model
{
    public $tableName;   //数据表名
    public $pk;
    

    public function setTable($tableName)
    {
        $this->tableName = $tableName;
    }
    
    public function setPk($pk)
    {
        $this->pk = $pk;
    }
    
    /**
     * 获取列表
     * @return array 列表
     */
    public function loadList($where, $field="*", $limit, $orderby)
    {
        try {
            $result =  db($this->tableName)->field($field)->where($where)->limit($limit)->order($orderby)->select();
            foreach ($result as $key => $value) {
                if ($this->tableName=='ext_praise') {
                    $result[$key]['title']= getcontenttitle($value['content_id']);
                    $result[$key]['uid']= getusermsg($value['uid']);
                }
                if ($this->tableName=='ext_shouhuo') {
                    $result[$key]['title']= getcontenttitle($value['content_id']);
                    $result[$key]['uid']= getusermsg($value['uid']);
                    $result[$key]['goods_id']= getgoodsmsg($value['goods_id']);
                }
                if ($this->tableName=='ext_problem') {
                    $result[$key]['uid']= getusermsg($value['uid']);
                    $result[$key]['img']= json_decode($value['uid']);
                }
                if ($this->tableName=='ext_praise') {
                    $result[$key]['addtime']= date('Y-m-d h:i:s', $value['addtime']);
                }
                if ($this->tableName=='ext_integral_list') {
                    switch ($value['type']) {
                        case '1':
                        $result[$key]['type'] = '儿童成长打卡';
                        $result[$key]['integral'] = '+'.$value['integral'];
                            break;
                        case '2':
                        $result[$key]['type'] = '分享';
                        $result[$key]['integral'] = '+'.$value['integral'];
                            break;
                        case '3':
                        $result[$key]['type'] = '积分兑换';
                        $result[$key]['integral'] = '-'.$value['integral'];
                            break;
                        default:
                        $result[$key]['type'] = '非正常渠道获取';
                            break;
                    }
                }
                $result[$key]['user_id']= getusermsg($value['user_id']);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $result;
    }
    
    /**
    * 获取统计
    * @return int 数量
    */
    public function countList($where)
    {
        try {
            $result = db($this->tableName)->where($where)->count();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $result;
    }
    
    /**
     * 获取信息
     * @param int
     * @return array 信息
     */
    public function getInfo($pk)
    {
        $map = array();
        $map[$this->pk] = $pk;
        return $this->getWhereInfo($map);
    }

    /**
     * 获取信息
     * @param array $where 条件
     * @return array 信息
     */
    public function getWhereInfo($where)
    {
        try {
            $result = db($this->tableName)->where($where)->find();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $result;
    }
    
    
    /**
     * 删除信息
     * @return array 信息
     */
    public function delete($where)
    {
        try {
            $result = db($this->tableName)->where($where)->delete();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $result;
    }
    
    
    /**
     * 按住键修改
     * @param array $where 条件
     * @return array 信息
     */
    public function edit($data)
    {
        try {
            $result = db($this->tableName)->update($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $result;
    }
    
    /**
     * 按条件修改
     * @param array $where 条件
     * @return array 信息
     */
    public function editWhere($where, $data)
    {
        try {
            $result = db($this->tableName)->where($where)->update($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $result;
    }
    
    
    /**
     * 创建信息
     * @return array 信息
     */
    public function createData($data)
    {
        try {
            $result = db($this->tableName)->insertGetId($data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $result;
    }
}
