<?php
namespace app\api\model;

use think\Model;

class Sigin extends Model
{
     
    /**
     * [addSingin 添加签到]
     * @param  $uid uid
     * @param  $add add
     * @return $data_token 返回bool
     */
    public function addSingin($uid, $add)
    {
        $data_token = db('ext_integral_list')->where(['user_id'=>$uid])->insertGetId($add);
        
        return $data_token ? true : false;
    }
    /**
    * [setSingin 设置签到]
    * @param  $uid uid
    * @param  $add add
    * @return $data_token 返回bool
    */
    public function setSingin($uid, $add)
    {
        $table_make = db('singin_day');
        $checksingin = $table_make->where(['uid'=>$uid])->find();
        $data_token = '';
        if ($checksingin) {
            $data_token = $table_make->where(['uid'=>$uid])->update($add);
        } else {
            $data_token = $table_make->insertGetId($add);
        }
        return $data_token ? true : false;
    }
    /**
    * [checkSingin 检验签到是否连续]
    * @param  $uid uid
    * @return $data_token 返回bool
    */
    public function checkSingin($uid, $wheretime=[])
    {
        $data_token = db('singin_day')->where(['uid'=>$uid])->whereTime('addtime', 'between', $wheretime)->find();
        return $data_token ? true : false;
    }
    /**
    * [getSingin 获取]
    * @param  $uid uid
    * @return $data_token 返回bool
    */
    public function getSingin($where, $page, $pagesize)
    {
        if (!$pagesize) {
            $pagesize=10;
        }
        $data = db('ext_integral_list')->field('integral,create_time,type')->where($where)->page($page, $pagesize)->select();
        foreach ($data as $key => $value) {
            switch ($value['type']) {
                case '1':
                    $data[$key]['type'] = '儿童成长打卡';
                    $data[$key]['integral'] = '+'.$value['integral'];
                    break;
                case '2':
                    $data[$key]['type'] = '分享';
                    $data[$key]['integral'] = '+'.$value['integral'];
                    break;
                case '3':
                    $data[$key]['type'] = '积分兑换';
                    $data[$key]['integral'] = '+'.$value['integral'];
                    break;
                default:
                    # code...
                    break;
            }
            $data[$key]['create_time'] = date('Y-m-d h:i:s', $value['create_time']);
        }
        return $data ? $data : [];
    }
    /**
    * [getContinewDay 获取连续天数]
    * @param  $uid uid
    * @return $continue_day 返回int
    */
    public function getContinewDay($uid)
    {
        $data = db('singin_day')->field('continue_day')->where(['uid'=>$uid])->find();
        return $data ? $data['continue_day'] : 0;
    }
    /**
    * [addSiginMember 增加积分]
    * @param  $uid uid
    * @param  $praisevalue 积分值
    * @return $data 返回bool
    */
    public function addSiginMember($uid, $praisevalue)
    {
        $data = db('member')->where(['m_id'=>$uid])->setInc('amount', $praisevalue);
        return $data ? true : false;
    }
}
