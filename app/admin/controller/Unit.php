<?php

namespace app\admin\controller;

use app\admin\controller\Admin;
use app\common\service\CommonService;
use app\common\service\UnitService;

class Unit extends Admin
{


    /*单位管理*/
    public function index()
    {
        if (!$this->request->isAjax()) {
            return $this->fetch('index');
        } else {
            $limit  = input('post.limit', 0, 'intval');
            $offset = input('post.offset', 0, 'intval');
            $page   = floor($offset / $limit) +1 ;

            $where = [];
            $where['title'] = input('param.title', '', 'strip_tags');
            $where['content'] = input('param.content', '', 'strip_tags');

            $orderby = $this->request->post('orderby', '', 'strip_tags');

            $limit = ($page-1) * $limit.','.$limit;
            try {
                $field='*';
                $res = UnitService::loadList($where, $field, $limit, $orderby);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
            $list = $res['list'];
            $data['rows']  = $list;
            $data['total'] = $res['count'];

            exit(json_encode($data));
        }
    }

    /*创建数据*/
    public function add()
    {
        if (!$this->request->isPost()) {
            return $this->fetch('info');
        } else {
            $data = input('post.');
            try {
                $res = UnitService::saveData('add', $data);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
            echo json_encode(array('status'=>'00','message'=>'添加成功'));
        }
    }

    /*编辑数据*/
    public function update()
    {
        if (!$this->request->isPost()) {
            $frament_id = input('param.frament_id', '', 'intval');
            empty($frament_id) && exit(json_encode(array('status'=>'01','msg'=>'参数错误')));

            $info = model('Unit')->getInfo($frament_id);
            !$info && exit(json_encode(array('status'=>'01','msg'=>'没有数据')));
            $this->assign('info', $info);
            return $this->fetch('info');
        } else {
            $data = input('post.');
            try {
                $res = UnitService::saveData('edit', $data);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
            echo json_encode(array('status'=>'00','message'=>'修改成功'));
        }
    }

    /*删除数据*/
    public function delete()
    {
        $idx =  $this->request->post('frament_ids', '', 'strval');
        empty($idx) && exit(json_encode(array('status'=>'01','msg'=>'主键ID不能为空')));
        try {
            $where = [];
            $where['frament_id'] = array('in',$idx);
            $res = UnitService::delete($where);
        } catch (\Exception $e) {
            exit(json_encode(array('status'=>'02','msg'=>$e->getMessage())));
        }
        echo json_encode(array('status'=>'00','msg'=>'操作成功'));
    }
}
