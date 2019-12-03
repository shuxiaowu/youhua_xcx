<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Validate;
use think\Session;
use app\api\check\Check;

define('HOST', 'http://edg.leteng.net');
class Index extends Common
{
    protected $backData;
    protected $uid;
    
    protected function _initialize()
    {
        parent::_initialize();
    }
    public function ceshi()
    {
        return json(['uid'=>$this->uid]);
    }
    //添加食物
    public function addFoods()
    {
        $title = input('param.title', '');
        $type_id = input('param.type_id', '');//1：早餐，2：晚餐，3：午餐，4：上午加餐，5：中午加餐，6：下午加餐
        $list =input('list/a', '') ? json_encode(input('list/a', '')) : '';//食物 array
        $table = 'diet_records';
        $add = [
            'title'=>$title,
            'list'=>$list,
            'type_id'=>$type_id,
            'addtime'=>time(),
            'uid'=>$this->uid,
        ];
        $rule = [
            ['title','require','title为空'],
            ['list','require','list为空'],
            ['type_id','require','type_id为空'],
            ['addtime','require','时间有误'],
            ['uid','require','uid不存在']
        ];
        $validate = new Validate($rule);
        if ($this->uid) {
            if (!$validate->check($add)) {
                // throw new \Exception($validate->getError());
                $this->backData['code'] = -1001;
                $this->backData['msg'] = $validate->getError();
                return json($this->backData);
                exit;
            } else {
                $result = model('Home')->insertData($table, $add, $this->uid);
                if ($result) {
                    $this->backData['code'] = 0;
                    $this->backData['msg'] = '成功';
                    $this->backData['data'] = $list;
                    return json($this->backData);
                    exit;
                } else {
                    $this->backData['code'] = 1;
                    $this->backData['msg'] = '失败';
                    return json($this->backData);
                    exit;
                }
            }
        } else {
            $this->backData['code'] = 1002;
            $this->backData['msg'] = '请登录';
            return json($this->backData);
            exit;
        }
    }

    // 显示饮食记录列表
    public function showDietRecords()
    {
        $table = 'diet_records';
        $field = '*';
        $where = ['uid'=>$this->uid];
        $data = model('Home')->getfieldlist($table, $field, $where);
        if ($this->uid) {
            if ($data) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '成功';
                $this->backData['data'] = $data;
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '失败';
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1002;
            $this->backData['msg'] = '请登录';
            return json($this->backData);
            exit;
        }
    }
    //我的点赞
    public function myPraise()
    {
        $page = input('param.page', 1, 'intval');
        $pagesize = input('param.pagesize', 0);
        if (!$pagesize) {
            $pagesize =10;
        }
        if ($this->uid) {
            $list = model('Information')->paiseList($this->uid, $page, $pagesize);
            if ($list) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '获取成功';
                $this->backData['data']['list'] = $list;
                return json($this->backData);
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '数据为空';
                $this->backData['data']='';
                return json($this->backData);
            }
        } else {
            $this->backData['code'] = 1001;
            $this->backData['msg'] = '请登录';
            return json($this->backData);
        }
    }
    public function multipleupload()
    {
        $img= request()->file('img');//图片
        $pathImg=array();
        if ($this->uid) {
            if ($img) {
                foreach ($img as $key => $File) {
                    $info= $File->validate(['size'=>5000000,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH.'public_html/uploads/problem/'. DS . date('Ymd'), md5(microtime(true)).$key);
                    if ($info) {
                        $pathImg[]=date('Ymd') . '/' . $info->getFilename();
                    } else {
                        $this->backData['code'] = -1;
                        $this->backData['msg'] =$File->getError();
                        return json($this->backData);
                        exit;
                    }
                }
            }
            if ($pathImg) {
                $this->backData['code'] = 0;
                $this->backData['msg'] ='上传图片成功';
                $this->backData['data']['list'] =$pathImg;
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] ='上传图片失败';
                $this->backData['data'] ='';
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1001;
            $this->backData['msg'] = '请登录';
            return json($this->backData);
            exit;
        }
    }
    //投诉建议
    public function complaitAdvice()
    {
        $problemtype = input('problemtype', '');
        $discribe = input('discribe', '');
        $img= input('img/a', '');//图片
        $info = "";
        if ($this->uid) {
            $add = array('img'=>json($img),'problemtype'=>$problemtype,'discribe'=>$discribe,'uid'=>$this->uid,'create_time'=>date('Y-m-d h:i:s', time()));
            $result = Db::name('ext_problem')->insert($add);
            if ($result) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '提交成功';
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '提交失败';
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1001;
            $this->backData['msg'] = '请登录';
            return json($this->backData);
            exit;
        }
    }
    // 会员头像
    public function memberhead()
    {
        if ($this->uid) {
            $amount = model('Home')->getfield('member', 'amount', ['m_id'=>$this->uid]);
            $headpic = model('Home')->getfield('member', 'headimgurl', ['m_id'=>$this->uid]);
            $this->backData['code'] = 0;
            $this->backData['msg'] = '获取成功';
            $this->backData['data']['amount'] = $amount;
            $this->backData['data']['headpic'] = $headpic ? $headpic :'';
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg'] = '请登录';
            return json($this->backData);
            exit;
        }
    }
    // 会员积分列表
    public function memberJfList()
    {
        $page = input('page', 1, 'intval');
        $pagesize= input('pagesize');
        if ($this->uid) {
            $list = model('Sigin')->getSingin(['user_id'=>$this->uid], $page, $pagesize);
            $this->backData['code'] = 0;
            $this->backData['msg'] = '获取成功';
            $this->backData['data']['list'] = $list;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg'] = '请登录';
            return json($this->backData);
            exit;
        }
    }
    
    //积分商品列表
    public function jifenIntergral()
    {
        $page = input('page', 1, 'intval');
        $pagesize = input('pagesize');
        if ($this->uid) {
            $data = model('Home')->jifenIntergral($page, $pagesize);
            if ($data) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '获取成功';
                $this->backData['data'] = $data;
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '获取失败';
                $this->backData['data'] = [];
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1002;
            $this->backData['msg'] = '请登录';
            $this->backData['data'] = [];
            return json($this->backData);
            exit;
        }
    }
    //填写收货
    public function setDelivery()
    {
        $name = input('name', '');
        $goods_id = input('goods_id', '');
        $mobile = input('mobile', 0, 'intval');
        $address = input('address', '');
        $timestamp = input('timestamp', '');
        // $sign = input('sign', '');
        // $input = [
        //     'name'=>$name,
        //     'goods_id'=>$goods_id,
        //     'mobile'=>$mobile,
        //     'address'=>$address,

        // ];
        // Check::appBegin($input, $sign, $timestamp);
        if (!$timestamp) {
            echo json_encode(["code" => 1008,'msg'=>"timestamp参数异常"]);
            die;
        }
        if (abs($timestamp - time()) >=60) {
            echo json_encode(["code" => 1009,'msg'=>"当前请求请求超时"]);
            die;
        }
        $add = array(
            'mobile'=>$mobile,
            'name'=>$name,
            'addr'=>$address,
            'goods_id'=>$goods_id,
            'uid'=>$this->uid,
            'create_time'=>time()
        );
        $rule = [
            ['mobile','require|/^1[3456789]\d{9}$/','手机号不能为空|请输入正确的手机号'],
            ['name','require','姓名不能为空'],
            ['addr','require','地址不能为空'],
            ['goods_id','require','商品id不能为空'],
        ];
        $validate = new Validate($rule);
        if ($this->uid) {
            if (!$validate->check($add)) {
                // throw new \Exception($validate->getError());
                $this->backData['code'] = -1;
                $this->backData['msg'] = $validate->getError();
                return json($this->backData);
            } else {
                if (model('Home')->setDelivery($add, $this->uid)) {
                    if (model('Home')->checkGoods($goods_id)) {
                        $integral = model('Home')->dhIntergral('price,status', ['m_id'=>$goods_id]);
                        $mamberamount = model('Home')->getusermsg($this->uid);
                        if ($mamberamount['amount']<$integral['price']) {
                            $this->backData['code'] = 2;
                            $this->backData['msg'] = '积分不足';
                            return json($this->backData);
                            exit;
                        } else {
                            Db::name('member')->where('m_id', $this->uid)->setDec('amount', $integral['price']);
                            $addintergral = [
                                'user_id'=>$this->uid,
                                'integral'=>$integral['price'],
                                'ip'=>Request::instance()->ip(),
                                'type'=>config('duihuan'),
                                'create_time'=>time()
                            ];
                            $result = model('Sigin')->addSingin($this->uid, $addintergral);
                            $this->backData['code'] = 0;
                            $this->backData['msg'] = '兑换成功';
                            return json($this->backData);
                            exit;
                        }
                    } else {
                        $this->backData['code'] = -2;
                        $this->backData['msg'] = '商品不存在或已下架';
                        return json($this->backData);
                        exit;
                    }
                } else {
                    $this->backData['code'] = 1;
                    $this->backData['msg'] = '兑换失败';
                    return json($this->backData);
                    exit;
                }
            }
        } else {
            $this->backData['code'] = 1002;
            $this->backData['msg'] = '请登录';
            return json($this->backData);
            exit;
        }
    }
    //打卡渲染页面
    public function showSigin()
    {
        $arr_days = array('oneday','towday','threeday','fourday','fiveday','sixday','sevenday');
        $page = input('page', 1, 'intval');
        $pagesize = input('pagesize', 0, 'intval');
        $arr_integral= [];
        if ($this->uid) {
            $field = 'm_id,nickname,mobile,headimgurl,amount';
            $usermsg = model('Home')->getusermsg($this->uid, $field);
            $sigin_list = model('Sigin')->getSingin(['user_id'=>$this->uid,'type'=>config('qiandao')], $page, $pagesize);
            for ($i=0; $i <count($arr_days) ; $i++) {
                $dayid = $arr_days[$i];
                $integralvalue = model('Home')->getfield('config', 'data', ['name'=>$dayid]);
                $arr_integral[$i] =  $integralvalue;
            }
            $usermsg['arr_integral'] = $arr_integral;
            // $usermsg['sigin_list'] = $sigin_list;
            $usermsg['continue_day'] = model('Sigin')->getContinewDay($this->uid);
            $this->backData['code'] = 0;
            $this->backData['msg'] = '获取成功';
            $this->backData['data'] = $usermsg;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg'] = '获取失败';
            $this->backData['data'] = [];
            return json($this->backData);
            exit;
        }
    }
    //签到列表
    public function siginList()
    {
        $page = input('page', 1, 'intval');
        $pagesize = input('pagesize', 0, 'intval');
        if ($this->uid) {
            $sigin_list = model('Sigin')->getSingin(['user_id'=>$this->uid,'type'=>config('qiandao')], $page, $pagesize);
            $this->backData['code'] = 0;
            $this->backData['msg'] = '获取成功';
            $this->backData['data']['list'] = $sigin_list;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg'] = '获取失败';
            return json($this->backData);
            exit;
        }
    }
    /**
     * [setSigin 打卡]
     * @param  [array]
     * @return [json]      [返回结果]
     */
    public function setSigin()
    {
        $yeasterday =[date('Y-m-d', strtotime('-1 day')),date('Y-m-d', time())];
        $today =  [date('Y-m-d', time()),date('Y-m-d', strtotime('+1 day'))];
        if (model('Sigin')->checkSingin($this->uid, $today)) {
            $this->backData['code'] = -1;
            $this->backData['msg'] = '今日已打卡';
            $this->backData['data'] = [];
            return json($this->backData);
            exit;
        }
        $getsinginday = model('Sigin')->checkSingin($this->uid, $yeasterday) ? model('Home')->getfield('singin_day', 'continue_day', ['uid'=>$this->uid]) : 0;

        $arr_days = array('oneday','towday','threeday','fourday','fiveday','sixday','sevenday');
        $add = [];
        if ($this->uid) {
            $dayid = $arr_days[$getsinginday];
            $integralvalue = model('Home')->getfield('config', 'data', ['name'=>$dayid]);

            $add = [
                'user_id'=>$this->uid,
                'integral'=>$integralvalue,
                'ip'=>Request::instance()->ip(),
                'type'=>config('qiandao'),
                'create_time'=>time()
            ];
            if ($getsinginday<6) {
                $getsinginday+=1;
            }
            $addday=[
                'uid'=>$this->uid,
                'continue_day'=>$getsinginday,
                'addtime'=>time(),
            ];
            $result = model('Sigin')->addSingin($this->uid, $add);
            $continue = model('Sigin')->setSingin($this->uid, $addday);
            if ($result && $continue) {
                model('Sigin')->addSiginMember($this->uid, $integralvalue);
                $this->backData['code'] = 0;
                $this->backData['msg'] = '签到成功';
                $this->backData['data'] = array('integral'=>$integralvalue,'continue_day'=>$getsinginday );
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg']  = '请求错误';
                $this->backData['data'] = [];
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 3;
            $this->backData['msg'] = '非法操作';
            $this->backData['data'] = [];
            return json($this->backData);
            exit;
        }
    }
    // 记录每日饮食
    public function record()
    {
        $data =model('Home')->getusermsg($this->uid);
        $message = [
            'sex'=>$data['sex'],
            'age'=>$data['age'],
            'height'=>$data['height'],
            'weight'=>$data['weight']
        ];
        $rule = [
            ['sex','require','性别为空'],
            ['age','require','年龄为空'],
            ['height','require','身高为空'],
            ['weight','require','体重为空']
        ];
        $validate = new Validate($rule);
        if (!$validate->check($message)) {
            // throw new \Exception($validate->getError());
            $this->backData['code'] = -1001;
            $this->backData['msg'] = '信息不完整';
            $this->backData['data'] = $message;
            return json($this->backData);
        } else {
            $this->backData['code'] = 0;
            $this->backData['msg'] = '个人信息完整';
            $this->backData['data'] = $message;

            return json($this->backData);
        }
    }
    // 获取用户信息
    public function getUserMsg()
    {
        if ($this->uid) {
            $data =model('Home')->getusermsg($this->uid);
            $add = [
                'sex'=>$data['sex'],
                'age'=>$data['age'],
                'height'=>$data['height'],
                'weight'=>$data['weight'],
            ];
            $rule = [
                    ['sex','require','性别不能为空'],
                    ['age','require','年龄不能为空'],
                    ['height','require','身高不能为空'],
                    ['weight','require','体重不能为空'],
                ];
            $validate = new Validate($rule);
            if (!$validate->check($add)) {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '信息不完整';
                $this->backData['data'] = [];
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '获取信息成功';
                $this->backData['data'] = $data;
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1002;
            $this->backData['msg'] = '请登录';
            $this->backData['data'] = [];
            return json($this->backData);
            exit;
        }
    }
    // 填写信息
    public function setUserMsg(Request $request)
    {
        $sex = $request->param('sex', '');
        $age = $request->param('age', '');
        $height = $request->param('height', '');
        $weight = $request->param('weight', '');

        $this->backData['data'] = [];
        $add = [
                'sex'=>$sex=='男' ? 1 : 2,
                'age'=>$age,
                'height'=>$height,
                'weight'=>$weight,
            ];
        $rule = [
                ['sex','require','性别不能为空'],
                ['age','require','年龄不能为空'],
                ['height','require','身高不能为空'],
                ['weight','require','体重不能为空'],
            ];
        $validate = new Validate($rule);
        if ($this->uid) {
            if (!$validate->check($add)) {
                $this->backData['code'] = 1;
                $this->backData['msg'] ='信息不能为空';
                return json($this->backData);
                exit;
            } else {
                $result = model('Home')->addusermsg($this->uid, $add);
                if ($result) {
                    $this->backData['code'] = 0;
                    $this->backData['msg'] ='保存成功';
                    return json($this->backData);
                    exit;
                } else {
                    $this->backData['code'] = -1;
                    $this->backData['msg'] ='保存失败';
                    return json($this->backData);
                    exit;
                }
            }
        } else {
            $this->backData['code'] = -1005;
            $this->backData['msg'] ='非法操作';
            return json($this->backData);
            exit;
        }
    }
    //食物物类别
    public function foodtype()
    {
        $data = model('Home')->foodtype();
        if ($data) {
            $this->backData['code'] = 0;
            $this->backData['msg'] ='返回成功';
            $this->backData['data']['list'] = $data;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg'] ='返回失败';
            $this->backData['data'] = '';
            return json($this->backData);
            exit;
        }
    }
    //食物列表
    public function foodlist()
    {
        $type_id = input('type_id', 0, 'intval');
        $data = model('Home')->foodlist($type_id);
        if ($data) {
            $this->backData['code'] = 0;
            $this->backData['msg'] ='返回成功';
            $this->backData['data']['list'] = $data;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg'] ='数据为空';
            $this->backData['data'] = '';
            return json($this->backData);
            exit;
        }
    }
    //食物单位
    public function foodunit()
    {
        $data = model('Home')->foodunit();
        if ($data) {
            $this->backData['code'] = 0;
            $this->backData['msg'] ='返回成功';
            $this->backData['data'] = $data;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg'] ='返回失败';
            $this->backData['data'] = '';
            return json($this->backData);
            exit;
        }
    }
    public function heightForecast()
    {
        $data = input('param.', '');
        $map = [
            'sex'=>$data['sex'] !='' ? ($data['sex'] == '男' ? 1 :2) :0,
            'fatherheight'=>$data['fatherheight'],
            'motherheight'=>$data['motherheight'],
            'age'=>$data['age'],
            'myheight'=>$data['myheight'],
            'weight'=>$data['weight'],
            'uid'=>$this->uid,
            'addtime'=>time(),

        ];
        $rule = [
            ['sex','require','性别不能为空'],
            ['age','require','年龄不能为空'],
            ['fatherheight','require','父亲身高不能为空'],
            ['motherheight','require','母亲身高不能为空'],
            ['myheight','require','我的身高不能为空'],
            ['weight','require','体重不能为空'],
        ];
        $validate = new Validate($rule);
        if (!$validate->check($map)) {
            $this->backData['code'] = 1;
            $this->backData['msg'] =$validate->getError();
            return json($this->backData);
            exit;
        } else {
            $result = false;
            if (model('Home')->checkHeightForecast($this->uid)) {
                $result = model('Home')->updateHeightForecast($this->uid, $map);
            } else {
                $result = model('Home')->heightForecast($map);
            }
            if ($result) {
                $this->backData['code'] = 0;
                $this->backData['msg'] ='返回成功';
                $this->backData['data']['url'] =HOST.'/api/news/heightForecas?Id='.$this->uid;
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 2;
                $this->backData['msg'] ='返回失败';
                return json($this->backData);
                exit;
            }
        }
    }
}
