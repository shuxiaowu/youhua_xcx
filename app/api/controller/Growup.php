<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Validate;
use think\Cache;

class Growup extends Common
{
    protected $backData;
    protected $uid;
    
    protected function _initialize()
    {
        parent::_initialize();
    }
    public function changePassword()
    {
        $input = input('param.', '');
        $map = [
            'oldpassword'=>$input['oldpassword'],
            'newpassword'=>$input['newpassword'],
            'respassword'=>$input['respassword'],
        ];
        $rule = [
            ['oldpassword','require','旧密码不能为空'],
            ['newpassword','require','新密码不能为空'],
            ['respassword','require','新密码不能为空'],
        ];
        $validate = new Validate($rule);
        if (!$validate->check($map)) {
            $this->backData['code'] = -2;
            $this->backData['msg'] = $validate->getError();
            return json($this->backData);
            exit;
        }
        if ($input['newpassword'] != $input['respassword']) {
            $this->backData['code'] = -1;
            $this->backData['msg'] = '新密码不一致';
            return json($this->backData);
            exit;
        }

        
        if ($this->uid) {
            $password = model('Home')->getfield('member', 'password', ['m_id'=>$this->uid]);
            if (md5($input['newpassword']) == $password) {
                $this->backData['code'] = 2;
                $this->backData['msg'] = '不能与旧密码相同';
                return json($this->backData);
                exit;
            }
            if (md5($input['oldpassword']) != $password) {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '旧密码错误';
                return json($this->backData);
                exit;
            } else {
                model('Home')->updateMsgData('member', ['password'=>md5($input['newpassword'])], ['m_id'=>$this->uid]);
                $this->backData['code'] = 0;
                $this->backData['msg'] = '修改成功';
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
    // 编辑头像
    public function headimgEdit()
    {
        $headimg = request()->file('headimg');
        $pathImg = '';
        if ($this->uid) {
            if (!$headimg) {
                $this->backData['code'] = -2;
                $this->backData['msg'] = '图片为空';
                return json($this->backData);
                exit;
            } else {
                $info= $headimg->validate(['size'=>5000000,'ext'=>'jpg,png,gif,jpeg'])->move(ROOT_PATH . 'public_html/uploads/headimg' . DS . date('Ymd'), md5(microtime(true)));
                if ($info) {
                    $pathImg=date('Ymd').'/'.$info->getFilename();
                } else {
                    $this->backData['code'] = -1;
                    $this->backData['msg'] ='图片编辑失败'.$pathImg;
                    return json($this->backData);
                    exit;
                }
            }

            if (model('Home')->updateMsgData('member', ['headimgurl'=>$pathImg], ['m_id'=>$this->uid])) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '编辑成功';
                $this->backData['data']['img'] = $pathImg;
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '编辑失败';
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
    // 编辑名称
    public function nicknameEdit()
    {
        $nickname = input('param.nickname', '');
        if ($this->uid) {
            if (model('Home')->updateMsgData('member', ['nickname'=>$nickname], ['m_id'=>$this->uid])) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '编辑成功';
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '编辑失败';
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1001;
            $this->backData['msg'] = '认证失败';
            return json($this->backData);
            exit;
        }
    }
    // 编辑性别
    public function sexEdit()
    {
        $sex = input('param.sex', '');
        if ($this->uid) {
            if (model('Home')->updateMsgData('member', ['sex'=>$sex !='' ? ($sex=='男' ? 1 : 2) : 0], ['m_id'=>$this->uid])) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '编辑成功';
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '编辑失败';
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1001;
            $this->backData['msg'] = '认证失败';
            return json($this->backData);
            exit;
        }
    }
    // 编辑年龄
    public function ageEdit()
    {
        $age = input('param.age', '');
        if ($this->uid) {
            if (model('Home')->updateMsgData('member', ['age'=>$age], ['m_id'=>$this->uid])) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '编辑成功';
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '编辑失败';
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1001;
            $this->backData['msg'] = '认证失败';
            return json($this->backData);
            exit;
        }
    }
    // 编辑身高
    public function heightEdit()
    {
        $height = input('param.height', '');
        if ($this->uid) {
            if (model('Home')->updateMsgData('member', ['height'=>$height], ['m_id'=>$this->uid])) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '编辑成功';
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '编辑失败';
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1001;
            $this->backData['msg'] = '认证失败';
            return json($this->backData);
            exit;
        }
    }
    // 编辑体重
    public function weightEdit()
    {
        $weight = input('param.weight', '');
        if ($this->uid) {
            if (model('Home')->updateMsgData('member', ['weight'=>$weight], ['m_id'=>$this->uid])) {
                $this->backData['code'] = 0;
                $this->backData['msg'] = '编辑成功';
                return json($this->backData);
                exit;
            } else {
                $this->backData['code'] = 1;
                $this->backData['msg'] = '编辑失败';
                return json($this->backData);
                exit;
            }
        } else {
            $this->backData['code'] = 1001;
            $this->backData['msg'] = '认证失败';
            return json($this->backData);
            exit;
        }
    }
}
