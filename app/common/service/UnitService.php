<?php

namespace app\common\service;

use think\Validate;

class UnitService
{
    
    //加载默认数据
    public static function loadList($where, $field, $limit, $orderby)
    {
        try {
            foreach ($where as $k=>$v) {
                if (!$v) {
                    unset($where[$k]);
                }
            }
        
            $list = model('Unit')->loadList($where, $field, $limit, $orderby);
            $count = model('Unit')->countList($where);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
            
        return ['list'=>$list,'count'=>$count];
    }
    

    
    //批量删除
    public static function delete($where)
    {
        try {
            $reset = model('Unit')->delete($where);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
            
        return $reset;
    }
    
    
    //添加或者编辑数据
    public static function saveData($type, $data)
    {
        try {
            $rule = [];
            $rule = [
                ['title','require','名称不能为空'],
            ];
            
            $validate = new Validate($rule);
            if (!$validate->check($data)) {
                throw new \Exception($validate->getError());
            }
            
            if ($type == 'add') {
                $reset = model('Unit')->createData($data);
            } elseif ($type == 'edit') {
                $reset = model('Unit')->edit($data);
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
            
        return $reset;
    }
}
