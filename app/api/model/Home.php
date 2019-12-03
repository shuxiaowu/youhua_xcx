<?php
namespace app\api\model;

use think\Model;

class Home extends Model
{
     
    /**
     * [checkphone 验证手机号]
     * @param  $phone 手机号
     * @return $data 返回数据
     */
    public function checkphone($phone)
    {
        return db('member')->where(['mobile'=>$phone])->find() ? true :false;
    }
    /**
     * [checkpassword 验证密码]
     * @param  $phone 手机号 $password 密码
     * @return $data 返回数据
     */
    public function checkpassword($phone, $password)
    {
        $password == '' ? 'xxxxx' : $password;
        $data = db('member')->where(['mobile'=>$phone])->find();
        return $data['password']==md5($password) ? true : false;
    }
    /**
     * [getregister_time 获取创建时间]
     * @param  $phone 手机号
     * @return $data 返回数据
     */
    public function getregister_time($phone)
    {
        $data = db('member')->field('create_time')->where(['mobile'=>$phone])->find();
        return $data['create_time'] ? $data['create_time'] : '';
    }
    /**
     * [getuser_information 获取用户信息]
     * @param  $phone 手机号
     * @return $data 返回数据
     */
    public function getuser_information($phone, $field)
    {
        if (empty($field)) {
            $data = db('member')->field('m_id,nickname,sex,mobile,birth,height,weight,age,headimgurl')->where(['mobile'=>$phone])->find();
            return $data ? $data : [];
        } else {
            $data = db('member')->field($field)->where(['mobile'=>$phone])->find();
            return $data ? $data : [];
        }
    }
    /**
     * [check_token 查询token]
     * @param  $toke token
     * @return $data 返回bool
     */
    public function check_token($token)
    {
        $data_token = db('apitoken')->where(['token'=>$token])->find();
        
        return $data_token ? true : false;
    }
    /**
     * [getUid 查询token]
     * @param  $toke token
     * @param  $field field
     * @return $field uid
     */
    public function getfield($table, $field, $where=[])
    {
        $data_token = db($table)->where($where)->find();

        return $field ? $data_token ? $data_token[$field] : 0 : 0;
    }
    /**
     * [getfieldlist 查询token]
     * @param  $toke token
     * @param  $field field
     * @return $field uid
     */
    public function getfieldlist($table, $field, $where=[])
    {
        $data = db($table)->where($where)->select();
        foreach ($data as $key => $value) {
            $data[$key]['list'] = json_decode($value['list']);
        }
        return $data ? $data : 0;
    }
    /**
     * [getusermsg 获取用户信息]
     * @param  $uid uid
     * @return $data 返回bool
     */
    public function getusermsg($uid, $field)
    {
        $data = [];
        if (empty($field)) {
            $data = db('member')->field('m_id,mobile,birth,headimgurl,weight,height,openid,unionid,amount,sex,age')->where(['m_id'=>$uid])->find();
        } else {
            $data = db('member')->field($field)->where(['m_id'=>$uid])->find();
        }
       
        
        return $data ? $data : [];
    }
    /**
     * [addusermsg 添加信息至该用户]
     * @param  $uid uid
     * @return $data 返回bool
     */
    public function addusermsg($uid, $add)
    {
        $data = db('member')->where(['m_id'=>$uid])->update($add);
        
        return $data ? true : false;
    }
    /**
     * [function checkuid 检测uid]
     * @param $uid
     * @return bool
     */
    public function checkuid($uid)
    {
        $data = db('apitoken')->where('uid', $uid)->find();
        return $data ? true : false;
    }
    /**
     * [function checkip 检测ip]
     * @param $uid
     * @return bool
     */
    public function checkip($uid, $ip)
    {
        if ($uid && $ip) {
            $data = db('apitoken')->where('uid', $uid)->find();
            return ($data['token'] && $data['ip']!=$ip) ? true : false;
        }
    }
    /**
     * [function insertMsgData 更新信息]
     * @param $table 表名
     * @param $field 字段
     * @param $uid
     * @return bool
     */
    public function updateMsgData($table, $field=[], $where=[])
    {
        if (!empty($table) && !empty($field) && !empty($where)) {
            $data = db($table)->where($where)->update($field);
            return $data ? true : false;
        } else {
            return false;
        }
    }
    /**
     * [function insertData 插入信息]
     * @param $table 表名
     * @param $field 字段
     * @param $uid
     * @return bool
     */
    public function insertData($table, $field=[], $uid)
    {
        if (!empty($table) && !empty($field) && !empty($uid)) {
            $data = db($table)->insertGetId($field);
            return $data ? true : false;
        } else {
            return false;
        }
    }
    public function informationCenter()
    {
        $data = db('ext_test')->field('*')->where('1=1')->order('create_time DESC')->select();
        if ($data) {
            foreach ($data as $key => $value) {
                $data[$key]['create_time'] = date('Y-m-d h:i:s', $value['create_time']);
            }
        }
        return $data ? $data : '';
    }
    public function countInfoCenter()
    {
        $count = db('ext_test')->field('*')->where('1=1')->order('create_time DESC')->count();
        return $count;
    }
    public function articleInfoCenter($id)
    {
        $data = db('ext_test')->field('*')->where('data_id', $id)->order('create_time DESC')->find();
        if ($data) {
            $data['create_time']= date('Y-m-d h:i:s', $data['create_time']);
        }
        return $data ? $data : '';
    }
    //食物物类别
    public function foodtype()
    {
        $data = db('catagory_foods')->field('class_id,class_name')->where('1=1')->order('class_id DESC')->select();

        return $data ? $data : '';
    }
    //食物物类别
    public function foodunit()
    {
        $data = db('unit')->field('frament_id,title')->where('1=1')->order('frament_id DESC')->select();
    
        return $data ? $data : '';
    }
    //食物列表
    public function foodlist($id)
    {
        $where = '1=1';
        if ($id) {
            $where .= ' AND class_id'.$id;
        }
        $data = db('foods')->field('content_id,title,pic,energy_value,weight,unit')->where($where)->order('create_time DESC')->select();
        
        return $data ? $data : '';
    }
    //积分列表
    public function jifenIntergral($page, $pagesize=16)
    {
        $where = '1=1 AND status=10';
        $data = db('goods')->field('m_id,name,headimgurl,amount,price')->where($where)->page($page, $pagesize)->order('create_time DESC')->select();
            
        return $data ? $data : '';
    }
    //填写收货
    public function setDelivery($add)
    {
        $data = db('ext_shouhuo')->insertGetId($add);
        return $data ? $data : '';
    }
    //获取兑换的商品
    public function dhIntergral($field='*', $where=['m_id'=>0])
    {
        $data = db('goods')->field($field)->where($where)->find();
        return $data ? $data : '';
    }
    //查看商品id
    public function checkGoods($goods_id)
    {
        $data = db('goods')->field('m_id')->where(['status'=>10,'m_id'=>$goods_id])->find();
        return $data ? true : false;
    }
    // 检查
    public function checkHeightForecast($uid)
    {
        $data = db('height_forecast')->where('uid', $uid)->find();
        return $data ? true : false;
    }
    //身高预测
    public function heightForecast($add)
    {
        $data = db('height_forecast')->insertGetId($add);
        return $data ? true : false;
    }
    //更新身高预测
    public function updateHeightForecast($uid, $add)
    {
        $data = db('height_forecast')->where('uid', $uid)->update($add);
        return $data ? true : false;
    }
}
