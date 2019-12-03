<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Validate;

class Common extends Controller
{
    protected $request;  //用来处理参数
    protected $backData;
    protected $uid;
    protected function _initialize()
    {
        parent::_initialize();
        $this -> request = Request::instance();
        $token = Request::instance()->param('token');
        $ip = Request::instance()->ip();
        $where = ['token'=>$token];
        $this->uid =model('Home')->getfield('apitoken', 'uid', $where);
        if (model('Home')->checkip($this->uid, $ip)) {
            $this->backData['code'] = 1000;
            $this->backData['msg'] = '已经在另一台设备登录';
            return json($this->backData);
            die;
        }

        // 判断传过来的时间戳是否超时
        // $this -> check_time($this->request->only(['time']));
        // 验证token
        // echo json_encode(['sdsd'=>$this->request->param('token')]);
        // die;
        $this -> check_token($this->request->param('token'));
    }
 
  
    /**
     * [check_time 验证是否超时]
     * @param  [array] $arr [包含时间戳的参数数组]
     * @return [json]      [检测结果]
     */
    public function check_time($time)
    {
        if (!isset($time)||intval($time)<=1) {
            $this->return_msg(400, '时间戳不正确');
        }
        if (time()-intval($time)>60) {
            $this->return_msg(400, '请求超时');
        }
    }
    /**
     * [check_token 验证token(防止数据被篡改)]
     * @param  [array] $arr [全部请求参数]
     * @return [json]      [token验证结果]
     */
    public function check_token($token)
    {
        $checktoken = model('Home')->check_token($token);
        // api 传过来的 token
        if (!isset($token)||empty($token)) {
            $this ->return_msg(1001, 'token 不能为空');
        }

        if ($token != $checktoken) {
            echo session('api_token');
            $this -> return_msg(1001, 'token不正确');
        }
    }
    public function return_msg($code, $msg='', $data=[])
    {
        /******** 组合数据 ********/
        $return_data['code'] = $code;
        $return_data['msg'] = $msg;
        $return_data['data'] = $data;
        /******** 返回信息并终止脚本 ********/
        echo json_encode($return_data);
        die;
    }
}
