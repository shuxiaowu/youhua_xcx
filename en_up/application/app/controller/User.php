<?php
namespace app\app\controller;
use app\common\sms\SignatureHelper;
use think\Exception;

class User extends ControllerBase
{
    /**
     * 前缀控制器列表
     */
    protected $beforeActionList = [
        'need_login' => ['only' => [
//            'view',
            'get_user_info',
        ]],
    ];

    /**
     * 用户登录
     */
    public function login(){
        $phone = $this->request->param('phone','');
        $password = $this->request->param('password','');
        $encode_pwd = md5($password);
        $time = $_SERVER['REQUEST_TIME_FLOAT'];
        $res = model('user')->where(['phone'=>$phone,'password'=>$encode_pwd])->find();
        if(empty($res)){
            return $this->error('用户不存在');
        }

        $user_token = md5($time);
        $user_key = 'user_token:'.$user_token;

        if($res){
            cookie($user_key,$res->id,3600*24*30); //用户登录成功缓存30天
            return $this->success(['user_token'=>$user_token,'user_info'=>$res->toArray()],'登录成功');
        }else{
            return $this->error('登录失败');
        }


    }
    /**
     * 用户手机号注册
     */
    public function register(){
        $phone = $this->request->param('phone','');
        $code = $this->request->param('code','');
        $password = $this->request->param('password','');
        $cache_key = $phone.':code';
        $cache_code = cookie($cache_key);

        if(!$password){
            return $this->error('请输入密码');
        }

        $preg_phone='/^1[345789]\d{9}$/ims';
        if(!preg_match($preg_phone,$phone)){
            return $this->error('请输入格式正确的手机号码');
        }
        if($cache_code!=$code){
            return $this->error('验证码不正确');
        }
        $encode_pwd = md5($password);
        $res = model('user')->insertGetId(['phone'=>$phone,'password'=>$encode_pwd,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);
        if ($res){
            return $this->success([],'注册成功');
        }else{
            return $this->error('注册失败');
        }

    }

    /**
     * 用户微信登录
     */
      public function wechat_login(){
          $openid = $this->request->param('openid','');
          $unionid = $this->request->param('unionid','');
          $nickname = $this->request->param('nickname','');
          $gender = $this->request->param('gender','');
          $avatar = $this->request->param('avatar','');
          $user_token = md5($_SERVER['REQUEST_TIME_FLOAT']);
          $user_key = 'user_token:'.$user_token;
          if(!$unionid){
              return $this->error('unionid不存在');
          }

          $uid = model('user_wechat')->where(['unionid'=>$unionid])->value('uid');
          $data = db('user')->where('id',$uid)->find();
          if($uid && !empty($data) && $data['phone']){
              cookie($user_key,$uid,3600*24*30); //用户登录成功缓存30天
              $data = db('user')->where('id',$uid)->find();
              return $this->success(['user_token'=>$user_token,'user_info'=>$data->toArray()],'登录成功');
          }else{//微信注册
              if(!$uid){
                  $res = model('user')->wechat_register(['openid'=>$openid,'unionid'=>$unionid,'nickname'=>$nickname,'gender'=>$gender,'avatar'=>$avatar]);
                  return $this->success(['user_token'=>'','user_info'=>['id'=>$res]],'绑定手机',888);
              }else{
                  return $this->success(['user_token'=>'','user_info'=>['id'=>$uid]],'绑定手机',888);
              }
          }
      }

    /**
     * 绑定手机
     */
    public function bind_phone(){
        $phone = $this->request->param('phone','');
        $code = $this->request->param('code','');
        $password = $this->request->param('password','');
        $uid = $this->request->param('uid','');
        $cache_key = $phone.':code';
        $cache_code = cookie($cache_key);
        if(!$password){
            return $this->error('请输入密码');
        }

        $preg_phone='/^1[345789]\d{9}$/ims';
        if(!preg_match($preg_phone,$phone)){
            return $this->error('请输入格式正确的手机号码');
        }
        if($cache_code!=$code){
            return $this->error('验证码不正确');
        }
        $res = model('user')->where('id',$uid)->update(['phone'=>$phone,'password'=>md5($password)]);
        if($res){
            $user_token = md5($_SERVER['REQUEST_TIME_FLOAT']);
            $user_key = 'user_token:'.$user_token;
            cookie($user_key,$uid,3600*24*30); //用户登录成功缓存30天
            return $this->success(['user_token'=>$user_token,'user_info'=>model('user')->where('id',$uid)->find()->toArray()],'登录成功');
        }else{
            return $this->error('绑定失败');
        }

    }

    /**
     * 获取用户信息
     */
    public function get_user_info(){
        $data = db('user')->where('id',$this->uid)->find()->toArray();
        $unionid = db('user_wechat')->where('uid',$this->uid)->value('unionid');
        $data['unionid']=$unionid;
        return $this->success($data);
    }

    /**
     * 找回密码
     */
    public function search_password(){
        $phone = $this->request->param('phone','');
        $code = $this->request->param('code','');
        $password = $this->request->param('password','');
        $cache_key = $phone.':code';
        $cache_code = cookie($cache_key);

        if(!$password){
            return $this->error('请输入密码');
        }

        $preg_phone='/^1[345789]\d{9}$/ims';
        if(!preg_match($preg_phone,$phone)){
            return $this->error('请输入格式正确的手机号码');
        }
        if($cache_code!=$code){
            return $this->error('验证码不正确');
        }
        $encode_pwd = md5($password);
        $res = model('user')->where(['phone'=>$phone])->update(['password'=>$encode_pwd,'updated_at'=>date('Y-m-d H:i:s')]);
        if ($res){
            return $this->success([],'设置成功');
        }else{
            return $this->error('设置失败');
        }

    }

    /**
     * 获取手机验证码
     */
    public function get_sms_code(){
        $phone = $this->request->param('phone','');
        $cache_key = $phone.':code';
        $cache_code = cookie($cache_key);
        if($cache_code){
            return $this->success([],'验证码已经发送');
        }
        $rand_code = mt_rand(1000,9999);
        try{
            $res = $this->sendSms(['phone'=>$phone,'rand_code'=>$rand_code]);
            $res = json_decode(json_encode($res),1);
            if($res && !empty($res) && $res['Code']=='OK'){
                cookie($cache_key,$rand_code,600);
                return $this->success([],'验证码发送成功');
            }else{
                return $this->error('验证码发送失败');
            }

        }catch (Exception $e){
            return $this->error('验证码发送失败');
        }
    }
    /**
     * aliyun发送短信
     */
    public function sendSms($args=[]) {

        $params = array ();

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
        $params['TemplateParam'] = Array (
            "code" => $args['rand_code'],
//            "product" => "阿里通信"
        );

        // fixme 可选: 设置发送短信流水号
//        $params['OutId'] = "12345";

        // fixme 可选: 上行短信扩展码, 扩展码字段控制在7位或以下，无特殊需求用户请忽略此字段
//        $params['SmsUpExtendCode'] = "1234567";


        // *** 需用户填写部分结束, 以下代码若无必要无需更改 ***
        if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
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
