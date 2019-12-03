<?php
namespace app\app\controller;
use think\Controller;
use think\exception\HttpResponseException;
class ControllerBase extends Controller
{
    protected $uid = 0;
    protected $source_style = 0;
    protected function _initialize(){  //接口基类方法  控制整个系统接口
        $user_token = $this->request->param('user_token','');
        $user_key = 'user_token:'.$user_token;
        $uid = cache($user_key);
        if($uid){
            $this->uid = $uid;
        }
    }

    /**
     *  session_uid  如果不大于0 表示未登陆
     */
    protected function need_login()
    {
        if(!$this->uid){
            return $this->error('user_token不存在或者已经过期',706);
        }

    }



    /**
     * 操作成功返回的数据
     * @param string $msg   提示信息
     * @param mixed $data   要返回的数据
     * @param int   $code   错误码，默认为0
     * @param string $type  输出类型
     * @param array $header 发送的 Header 信息
     */
    protected function success($data = [], $msg = 'success', $code = 0, $type = null, array $header = [])
    {
        $this->result($msg, $data, $code, $type, $header);
    }

    /**
     * 操作失败返回的数据
     * @param string $msg   提示信息
     * @param mixed $data   要返回的数据
     * @param int   $code   错误码，默认为1
     * @param string $type  输出类型
     * @param array $header 发送的 Header 信息
     */
    protected function error($msg = 'error', $code = 1, $data = [], $type = null, array $header = [])
    {
        $this->result($msg, $data, $code, $type, $header);
    }

    /**
     * 返回封装后的 API 数据到客户端
     * @access protected
     * @param mixed  $msg    提示信息
     * @param mixed  $data   要返回的数据
     * @param int    $code   错误码，默认为0
     * @param string $type   输出类型，支持json/xml/jsonp
     * @param array  $header 发送的 Header 信息
     * @return void
     * @throws HttpResponseException
     */
    protected function result($msg, $data = [], $code = 0, $type = null, array $header = [])
    {
        if (is_string($msg)) {
            $result = json_decode($msg, true);
            if ($result==null) {
                $result = [
                    'code' => $code,
                    'msg'  => $msg,
                    'data' => $data,
                    'time' => $this->request->server('REQUEST_TIME'),
                ];
            }
        } else {
            $result = (array)$msg;
        }

        // 如果未设置类型则自动判断
        $type = $type ? $type : ($this->request->param(config('var_jsonp_handler')) ? 'jsonp' : 'json');

        if (isset($header['statuscode'])) {
            $code = $header['statuscode'];
            unset($header['statuscode']);
        } else {
            //未设置状态码,根据code值判断
            $code = $code >= 600 || $code < 200 ? 200 : $code;
        }
        $response = \think\Response::create($result, $type, $code)->header($header);
        throw new HttpResponseException($response);
    }

}
