<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Validate;
use think\Db;
use app\common\sms\SignatureHelper;
use redis\MyRedis;
use think\Cache;

define('APPID', 'wx6b50564386678e69');
define('SECRET', 'c8ae8ab00eb8586ee54e7d852974281c');
class Users
{
    protected $request; //用来处理参数
    protected $backData =[];

    public function cscode()
    {
        return json(['code'=>Cache::get('bindcode')]);
    }
    public function login()
    {
        $this -> request = Request::instance();
        session('app_token'.$phone, null);
        $phone = $this->request->param('phone', '');
        $password = $this->request->param('password', '');
        $ip = $this->request->ip();
        $this->backData['data'] = [];
        $msg = [
            'mobile'=>$phone,
            'password'=>$password
        ];
        $rule = [
            ['mobile','require|/^1[3456789]\d{9}$/','手机号不能为空|请输入正确的手机号'],
            ['password','require','密码不能为空'],
        ];
        $arr=[];
        $validate = new Validate($rule);
       
        if (!$validate->check($msg)) {
            // throw new \Exception($validate->getError());
            $this->backData['code'] = 1;
            $this->backData['msg'] = $validate->getError();
            return json($this->backData);
        } else {
            if (model('Home')->checkphone($phone)) {
                if (model('Home')->checkpassword($phone, $password)) {
                    $uid = $this->getuid($phone);
                    $arr =model('Home')->getuser_information($phone);
                    $arr['token'] = md5('api_'.md5($phone).md5($password).md5(time()).'_api');
                    $this->backData['code'] = 0;
                    $this->backData['data'] = $arr;
                    $this->backData['msg'] = '登录成功';
                
                    if (model('Home')->checkuid($uid)) {
                        Db::name('apitoken')->where('uid', $uid)->update(['token'=>$arr['token'],'timestamp'=>time(),'ip'=>$ip]);
                    } else {
                        Db::name('apitoken')->insertGetId(['token'=>$arr['token'],'uid'=>$uid,'timestamp'=>time(),'ip'=>$ip]);
                    }
                    return json($this->backData);
                    exit;
                } else {
                    $this->backData['code'] = 2;
                    $this->backData['msg'] = '密码错误';
                    return json($this->backData);
                    exit;
                }
            } else {
                $this->backData['code'] = 3;
                $this->backData['msg'] = '手机号不存在';
                return json($this->backData);
                exit;
            }
        }

        return json($this->backData);
    }
    public function authorlogin()
    {
        $this ->request = Request::instance();
        $code = $this->request->param('code', '');
        // 参数
        $params['appid']= APPID;
        $params['secret']= SECRET;
        $params['code']= $this->request->param('code');
        $params['grant_type']= 'authorization_code';
        $url ='https://api.weixin.qq.com/sns/oauth2/access_token';
        $arr = $this->httpWurl($url, $params, 'POST');
        // $arr = $this->doCurl($url);
        $arr = json_decode($arr, true);

        // 判断是否成功
        if (isset($arr['errcode']) && !empty($arr['errcode'])) {
            $this->backData['code'] = -1;
            $this->backData['msg'] = '授权失败';
            return json($this->backData);
            exit;
        }
        $this->backData['data'] = [];
        $openid = $arr['openid'];
        $unionid = $arr['unionid'];
        $map = array(
            'openid'=>$openid,
            'unionid'=>$unionid
        );
        $is_openid = Db::name('menber')->where(['openid'=>$openid,'unionid'=>$unionid])->find();
        if (!empty($is_openid)) {
            if (!empty($is_openid['mobile'])) {
                $uid = $this->getuid($is_openid['mobile']);
                $token = md5('api_'.md5($is_openid['mobile']).md5($is_openid['password']).md5(time()).'_api');
                Db::name('apitoken')->where('uid', $uid)->update(['token'=>$token,'timestamp'=>time(),'ip'=>$ip]);
                
                $this->backData['code'] = 0;
                $this->backData['msg'] = '已绑定手机号，可直接登录';
                $this->backData['data'] = model('Home')->getuser_information($is_openid['mobile']);
                $this->backData['token'] = $token;
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '未绑定手机号';
                $this->backData['data'] = $arr;
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 2;
            $this->backData['msg'] = '需绑定手机号';
            $this->backData['data'] = $arr;
            return json($this->backData);
            exit;
        }
    }

    //注册
    public function register()
    {
        $this ->request = Request::instance();
        $phone = $this->request->param('phone', '');
        $code = $this->request->param('code', '');
        $password = $this->request->param('password', '');
        $create_time = time();
        // $this->backData['token'] = '';
        $msg = [
            'mobile'=>$phone,
            'password'=>$password
        ];
        $rule = [
            ['mobile','require|/^1[3456789]\d{9}$/','手机号不能为空|请输入正确的手机号'],
            ['code','require','验证码不能为空'],
            ['password','require','密码不能为空'],
        ];
        // $session_code = session($phone.':code');
        $uid = $this->getuid($phone);
        $data = Db::name('apitoken')->where('uid', $uid)->find();
        // $session_code =  $data['code'];
        $session_code =  Cache::get('code'.$phone);
        $validate = new Validate($rule);
        if (!(model('Home')->checkphone($phone))) {
            if (!$validate->check($msg)) {
                // throw new \Exception($validate->getError());
                $this->backData['code'] = 1;
                $this->backData['msg'] = $validate->getError();
                return json($this->backData);
            } else {
                if (!Cache::get('code'.$phone)) {
                    $this->backData['code'] = 10005;
                    $this->backData['msg'] = '验证码失效';
                    return json($this->backData);
                    exit;
                }
                if ($code ==  $session_code) {
                    $pascode = $this->setCode(6);
                    $result = Db::name('member')->insertGetId(['nickname'=>'用户'.$phone,'mobile'=>$msg['mobile'],'status'=>10,'password'=>md5($msg['password']),'code'=>$pascode,'create_time'=>$create_time]);
                    $this->backData['code'] = 0;
                    $this->backData['msg'] = '注册成功';
                    Cache::rm('code'.$phone);
                    if (model('Home')->checkuid($uid)) {
                        Db::name('apitoken')->where('uid', $uid)->update(['code'=>'']);
                    }
                    // $this->backData['data'] = $msg;
                    return json($this->backData);
                    exit;
                } else {
                    $this->backData['code'] = 2;
                    $this->backData['msg'] = '验证码有误';
                    return json($this->backData);
                    exit;
                }
            }
        } else {
            $this->backData['code'] = -1;
            $this->backData['msg'] = '手机号已注册';
            return json($this->backData);
            exit;
        }
    }
    // 绑定微信号
    public function bindWx()
    {
        $this ->request = Request::instance();
        $phone = $this->request->param('phone', '');
        $code = $this->request->param('code', '');
        $openid = $this->request->param('openid', '');
        $unionid = $this->request->param('unionid', '');
        $msg = [
            'mobile'=>$phone,
            'code'=>$code,
            'openid'=>$openid,
            'unionid'=>$unionid,

        ];
        $rule = [
            ['mobile','require|/^1[3456789]\d{9}$/','手机号不能为空|请输入正确的手机号'],
            ['code','require','验证码不能为空'],
            ['openid','require','openid不能为空'],
            ['unionid','require','unionid不能为空']
        ];
        $session_code = Cache::get('bindcode'.$phone);
        $validate = new Validate($rule);
        if (!$validate->check($msg)) {
            // throw new \Exception($validate->getError());
            $this->backData['code'] = 1;
            $this->backData['msg'] = $validate->getError();
            return json($this->backData);
        } else {
            if (model('Home')->checkphone($phone)) {
                if (!Cache::get('bindcode'.$phone)) {
                    $this->backData['code'] = 10005;
                    $this->backData['msg'] = '验证码失效';
                    return json($this->backData);
                    exit;
                }
                if ($code == Cache::get('bindcode'.$phone)) {
                    $result = Db::name('member')->where(['mobile'=>$msg['mobile']])->update(['openid'=>$openid,'unionid'=>$unionid]);
                    $this->backData['code'] = 0;
                    $this->backData['msg'] = '绑定成功';
                    $uid = $this->getuid($phone);
                    $token = md5('api_'.md5($phone).md5($openid).md5(time()).'_api');
                    Db::name('apitoken')->where('uid', $uid)->update(['token'=>$token,'timestamp'=>time()]);
                    $this->backData['data'] = model('Home')->getuser_information($phone);
                    $this->backData['token'] = $token;
                    Cache::rm('bindcode'.$phone);
                    return json($this->backData);
                    exit;
                } else {
                    $this->backData['code'] = 0;
                    $this->backData['msg'] = '验证码错误';
                    return json($this->backData);
                    exit;
                }
            } else {
                $this->backData['code'] = 3;
                $this->backData['msg'] = '手机号不存在';
                return json($this->backData);
                exit;
            }
        }
    }
    //忘记密码
    public function forgetpassword()
    {
        $this ->request = Request::instance();
        $phone = $this->request->param('phone', '');
        $code = $this->request->param('code', '');
        $password = $this->request->param('password', '');
        //
        $msg = [
            'mobile'=>$phone,
            'password'=>$password
        ];
        $rule = [
            ['mobile','require|/^1[3456789]\d{9}$/','手机号不能为空|请输入正确的手机号'],
            ['password','require','密码不能为空'],
        ];
        $session_code = Cache::get('failcode'.$phone);
        $uid = $this->getuid($phone);
        $data = Db::name('apitoken')->where('uid', $uid)->find();
        $validate = new Validate($rule);
        if (!$validate->check($msg)) {
            // throw new \Exception($validate->getError());
            $this->backData['code'] = 1;
            $this->backData['msg'] = $validate->getError();
            return json($this->backData);
        } else {
            if (!Cache::get('failcode'.$phone)) {
                $this->backData['code'] = 10005;
                $this->backData['msg'] = '验证码失效';
                return json($this->backData);
                exit;
            }
            if ($code ==  $session_code) {
                $result = Db::name('member')->where(['mobile'=>$msg['mobile']])->update(['password'=>md5($msg['password'])]);
                $this->backData['code'] = 0;
                $this->backData['msg'] = '修改密码成功';
                // $this->backData['data'] = $msg;
                Cache::rm('failcode'.$phone);
                if (model('Home')->checkuid($uid)) {
                    Db::name('apitoken')->where('uid', $uid)->update(['failcode'=>'']);
                }
                
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 2;
                $this->backData['msg'] = '验证码有误';
                return json($this->backData);
                exit;
            }
        }
    }
    /**
     * 退出登录
     * @return $token
     */
    public function exitlogin()
    {
        $token = Request::instance()->param('token');
        $result = Db::name('apitoken')->where(['token'=>$token])->update(['token'=>'','timestamp'=>'']);
        if ($result) {
            $this->backData['code'] = 0;
            $this->backData['msg'] = '登出成功';
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg'] = '请求出错';
        }
        return json($this->backData);
    }
    /**
     * 创建验证码
     * @return max 验证码位数
     */
    public function setCode($max)
    {
        $rand = $max ? $max : 6;
        $code = '';
        for ($i=0;$i<$rand;$i++) {
            $code .=  mt_rand(0, 9);
        }
        return $code;
    }
    /**
    * 获取手机验证码
    */
    public function get_sms_code()
    {
        $this ->request = Request::instance();
        
        $phone = $this->request->param('phone', '');
        $type = $this->request->param('type', 1, 'intval');
        $check = model('Home')->checkphone($phone);
        if (empty($phone)) {
            $this->backData['code'] = -1;
            $this->backData['msg'] = '手机号不能为空';
            return json($this->backData);
            exit;
        }
        if ($check && $type==1) {
            $this->backData['code'] = 4;
            $this->backData['msg'] = '该手机号已经注册';
            return json($this->backData);
            exit;
        }

        if (!preg_match('/^1[3456789]\d{9}$/', $phone)) {
            $this->backData['code'] = 3;
            $this->backData['msg'] = '手机号码错误';
            return json($this->backData);
            exit;
        }
        $uid = $this->getuid($phone);
        $cache_key = $phone.':code';

        Db::name('apitoken')->where('uid', $uid)->update(['code'=>'','failcode'=>'','bindcode'=>'']);
        $cache_code = session($cache_key);
        if ($cache_code) {
            $this->backData['code'] = 4;
            $this->backData['msg'] = '不要重复发送';
            return json($this->backData);
            exit;
        }

        $rand_code =$this->setCode(6);
        
        try {
            $res = $this->sendSms(['phone'=>$phone,'rand_code'=>$rand_code]);
            $res = json_decode(json_encode($res), 1);
            if ($res && !empty($res) && $res['Code']=='OK') {
                session($cache_key, $rand_code, 600);
                if (model('Home')->checkuid($uid)) {
                    if ($type==1) {
                        Db::name('apitoken')->where('uid', $uid)->update(['code'=>$rand_code]);
                        Cache::set('code'.$phone, $rand_code, 60);
                    } elseif ($type==2) {
                        if (model('Home')->checkphone($phone)) {
                            Db::name('apitoken')->where('uid', $uid)->update(['failcode'=>$rand_code]);
                            Cache::set('failcode'.$phone, $rand_code, 60);
                        }
                    } elseif ($type==3) {
                        if (model('Home')->checkphone($phone)) {
                            Db::name('apitoken')->where('uid', $uid)->update(['bindcode'=>$rand_code]);
                            Cache::set('bindcode'.$phone, $rand_code, 60);
                        }
                    }
                }
                $this->backData['code'] = 0;
                $this->backData['msg'] = '验证码发送成功';
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '验证码发送失败';
                return json($this->backData);
                exit;
            }
        } catch (\Exception $e) {
            $this->backData['code'] = 2;
            $this->backData['msg'] = '验证码发送失败';
            return json($this->backData);
            exit;
        }
    }
    /**
     * @param $phone 手机号码
     * @return $uid
     */
    public function getuid($phone)
    {
        $data = Db::name('member')->field('m_id')->where('mobile', $phone)->find();
        return $data ?  $data['m_id'] : 0;
    }
    private function httpWurl($url, $params, $method = 'GET', $header = array(), $multi = false)
    {
        date_default_timezone_set('PRC');
        $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $header,
            CURLOPT_COOKIESESSION  => true,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_COOKIE         =>session_name().'='.session_id(),
        );
        /* 根据请求类型设置特定参数 */
        switch (strtoupper($method)) {
            case 'GET':
                // $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                // 链接后拼接参数  &  非？
                $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
                break;
            case 'POST':
                //判断是否传输文件
                $params = $multi ? $params : http_build_query($params);
                $opts[CURLOPT_URL] = $url;
                $opts[CURLOPT_POST] = 1;
                $opts[CURLOPT_POSTFIELDS] = $params;
                break;
            default:
                throw new Exception('不支持的请求方式！');
        }
        /* 初始化并执行curl请求 */
        $ch = curl_init();
        curl_setopt_array($ch, $opts);
        $data  = curl_exec($ch);
        $error = curl_error($ch);
        curl_close($ch);
        if ($error) {
            throw new Exception('请求发生错误：' . $error);
        }
        return  $data;
    }
    /**
     * aliyun发送短信
     */
    public function sendSms($args=[])
    {
        $params = array();

        // *** 需用户填写部分 ***
        // fixme 必填：是否启用https
        $security = false;

        // fixme 必填: 请参阅 https://ak-console.aliyun.com/ 取得您的AK信息
        $accessKeyId = "LTAIGJ2E5vwaMC22";
        $accessKeySecret = "z0NsIH1Skwxp5wMsTXf3v4Zvzgvn2C";

        // fixme 必填: 短信接收号码
        $params["PhoneNumbers"] = $args['phone'];

        // fixme 必填: 短信签名，应严格按"签名名称"填写，请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/sign
        $params["SignName"] = "乐腾科技";

        // fixme 必填: 短信模板Code，应严格按"模板CODE"填写, 请参考: https://dysms.console.aliyun.com/dysms.htm#/develop/template
        $params["TemplateCode"] = "SMS_123670945";

        // fixme 可选: 设置模板参数, 假如模板中存在变量需要替换则为必填项
        $params['TemplateParam'] = array(
            "code" => $args['rand_code'],
//            "product" => "阿里通信"
        );

        // fixme 可选: 设置发送短信流水号
//        $params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
//        $params['SmsUpExtendCode'] = "1234567";


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if (!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
            $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
        }

        // 初始化SignatureHelper实例用于设置参数，签名以及发送请求
        $helper = new SignatureHelper();

        // 此处可能会抛出异常，注意catch
        $content = $helper->request(
            $accessKeyId,
            $accessKeySecret,
            "dysmsapi.aliyuncs.com",
            array_merge($params, array(
                "RegionId" => "cn-hangzhou",
                "Action" => "SendSms",
                "Version" => "2017-05-25",
            )),
            $security
        );

        return $content;
    }
}
