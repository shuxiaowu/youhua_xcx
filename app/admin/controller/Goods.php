<?php

namespace app\admin\controller;

use app\admin\controller\Admin;
use app\common\service\CommonService;
use app\common\service\GoodsService;
use think\Db;

class Goods extends Admin
{

    /*会员管理*/
    public function index()
    {
        if (!$this->request->isAjax()) {
            return $this->fetch('index');
        } else {
            $limit  = input('post.limit', 0, 'intval');
            $offset = input('post.offset', 0, 'intval');
            $page   = floor($offset / $limit) +1 ;

            $where = [];
            $where['name'] =  ['like','%'.input('param.goods_name', '').'%'];
            $where['status'] = input('param.status', '');
           
            // dump($_POST);
            // die;
            $orderby = 'm_id DESC';

            $limit = ($page-1) * $limit.','.$limit;

            try {
                $field='*';
                $res = GoodsService::loadList($where, $field, $limit, $orderby);
                // $result =  DB::name('goods')->field('*')->where($where)->limit($limit)->order($orderby)->select();
                // dump($where);
                // die;
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
            $list =  $res['list'];
            $data['rows']  = $list;
            $data['total'] = $res['count'];

            exit(json_encode($data));
        }
    }

    /*创建数据*/
    public function add()
    {
        if (!$this->request->isPost()) {
            return $this->fetch('add');
        } else {
            $data = input('post.');
            $arr = [];
            $arr['create_time'] = time();
            $arr = array_merge($data, $arr);
            // dump($arr);
            // die;
            try {
                $res = GoodsService::saveData('add', $arr);
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
            $m_id = input('param.m_id', '', 'intval');
            empty($m_id) && exit(json_encode(array('status'=>'01','msg'=>'参数错误')));

            $info = model('goods')->getInfo($m_id);
            !$info && exit(json_encode(array('status'=>'01','msg'=>'没有数据')));
            $this->assign('info', $info);
            return $this->fetch('update');
        } else {
            $data = input('post.');
            $arr = [];
            $arr['create_time'] = time();
            $arr = array_merge($data, $arr);
            try {
                $res = GoodsService::saveData('edit', $arr);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
            echo json_encode(array('status'=>'00','message'=>'修改成功'));
        }
    }

    /*数值加*/
    public function recharge()
    {
        if (!$this->request->isPost()) {
            $info['m_id'] = input('param.m_id', '', 'intval');
            $this->assign('info', $info);
            return $this->fetch('recharge');
        } else {
            $idx =  $this->request->post('m_id', '', 'strval');
            $incData =  $this->request->post('amount', '', 'intval');

            empty($idx) && exit(json_encode(array('status'=>'01','msg'=>'主键ID不能为空')));
            empty($incData) && exit(json_encode(array('status'=>'01','msg'=>'操作数据不能为空')));
            try {
                $where = [];
                $where['m_id'] = array('in',$idx);
                $res = GoodsService::setInc($where, 'amount', $incData);
            } catch (\Exception $e) {
                exit(json_encode(array('status'=>'02','msg'=>$e->getMessage())));
            }
            echo json_encode(array('status'=>'00','msg'=>'操作成功'));
        }
    }

    /*数值减*/
    public function backRecharge()
    {
        if (!$this->request->isPost()) {
            $info['m_id'] = input('param.m_id', '', 'intval');
            $this->assign('info', $info);
            return $this->fetch('backRecharge');
        } else {
            $idx =  $this->request->post('m_id', '', 'strval');
            $incData =  $this->request->post('amount', '', 'intval');

            empty($idx) && exit(json_encode(array('status'=>'01','msg'=>'主键ID不能为空')));
            empty($incData) && exit(json_encode(array('status'=>'01','msg'=>'操作数据不能为空')));
            try {
                $where = [];
                $where['m_id'] = array('in',$idx);
                $res = GoodsService::setDec($where, 'amount', $incData);
            } catch (\Exception $e) {
                exit(json_encode(array('status'=>'02','msg'=>$e->getMessage())));
            }
            echo json_encode(array('status'=>'00','msg'=>'操作成功'));
        }
    }

    /*删除数据*/
    public function delete()
    {
        $idx =  $this->request->post('m_ids', '', 'strval');
        empty($idx) && exit(json_encode(array('status'=>'01','msg'=>'主键ID不能为空')));
        try {
            $where = [];
            $where['m_id'] = array('in',$idx);
            $res = GoodsService::delete($where);
        } catch (\Exception $e) {
            exit(json_encode(array('status'=>'02','msg'=>$e->getMessage())));
        }
        echo json_encode(array('status'=>'00','msg'=>'操作成功'));
    }

    /*编辑数据*/
    public function forbidden()
    {
        $idx =  $this->request->post('m_ids', '', 'strval');
        $statusData =  $this->request->post('statusData', '', 'strval');
        empty($idx) && exit(json_encode(array('status'=>'01','msg'=>'主键ID不能为空')));
        empty($statusData) && exit(json_encode(array('status'=>'02','msg'=>'状态信息不能为空')));

        try {
            $where = [];
            $where['m_id'] = array('in',$idx);
            $dt = explode('|', $statusData);
            if (empty($dt[0]) && $dt[0] !== '0' || empty($dt[1]) && $dt[1] !== '0') {
                exit(json_encode(array('status'=>'01','msg'=>'参数错误')));
            }
            $data[$dt[0]] = $dt[1];
            $res = GoodsService::editWhere($where, $data);
        } catch (\Exception $e) {
            exit(json_encode(array('status'=>'02','msg'=>$e->getMessage())));
        }
        echo json_encode(array('status'=>'00','msg'=>'操作成功'));
    }

    /*修改状态*/
    public function start()
    {
        $idx =  $this->request->post('m_ids', '', 'strval');
        $statusData =  $this->request->post('statusData', '', 'strval');
        empty($idx) && exit(json_encode(array('status'=>'01','msg'=>'主键ID不能为空')));
        empty($statusData) && exit(json_encode(array('status'=>'02','msg'=>'状态信息不能为空')));

        try {
            $where = [];
            $where['m_id'] = array('in',$idx);
            $dt = explode('|', $statusData);
            if (empty($dt[0]) && $dt[0] !== '0' || empty($dt[1]) && $dt[1] !== '0') {
                exit(json_encode(array('status'=>'01','msg'=>'参数错误')));
            }
            $data[$dt[0]] = $dt[1];
            $res = GoodsService::editWhere($where, $data);
        } catch (\Exception $e) {
            exit(json_encode(array('status'=>'02','msg'=>$e->getMessage())));
        }
        echo json_encode(array('status'=>'00','msg'=>'操作成功'));
    }

    
    /*修改密码*/
    public function updatePassword()
    {
        if (!$this->request->isPost()) {
            $info['m_id'] = input('param.m_id', '', 'intval');
            $this->assign('info', $info);
            return $this->fetch('updatePassword');
        } else {
            $data = input('post.');
            try {
                $res = GoodsService::saveData('edit', $data);
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
            echo json_encode(array('status'=>'00','message'=>'修改成功'));
        }
    }

    /*批量编辑数据*/
    public function batchUpdate()
    {
        if (!$this->request->isPost()) {
            $m_id = input('param.m_id', '', 'strval');
            empty($m_id) && exit(json_encode(array('status'=>'01','msg'=>'参数错误')));

            $info['m_id'] = $m_id;
            $this->assign('info', $info);
            return $this->fetch('batchUpdate');
        } else {
            $data = input('post.');
            try {
                foreach ($data as $k=>$v) {
                    if (!$v) {
                        unset($data[$k]);
                    }
                }
                $pk_idx = explode(',', $data['m_id']);
                foreach ($pk_idx as $key=>$val) {
                    $data['m_id'] = $val;
                    $res = GoodsService::saveData('edit', $data);
                }
            } catch (\Exception $e) {
                $this->error($e->getMessage());
            }
            echo json_encode(array('status'=>'00','message'=>'修改成功'));
        }
    }

    /*查看数据*/
    public function viewMember()
    {
        $m_id = input('param.m_id', '', 'intval');
        empty($m_id) && exit(json_encode(array('status'=>'01','msg'=>'参数错误')));

        $info = model('goods')->getInfo($m_id);
        !$info && exit(json_encode(array('status'=>'01','msg'=>'没有数据')));
        $this->assign('info', $info);
        return $this->fetch('viewMember');
    }
}
