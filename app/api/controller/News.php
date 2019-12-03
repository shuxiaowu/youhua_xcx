<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Validate;
use think\Cache;

class News extends Controller
{
    public function index()
    {
        $num =Cache::get('num') ? Cache::get('num')+1 : 1;
        $content_id = input('param.content_id', 0);
        $token = input('param.token', '');
        $where = ['token'=>$token];
        $uid =model('Home')->getfield('apitoken', 'uid', $where);
        $ispaise = false;
        if (model('Information')->isPaise($content_id, $uid)) {
            $ispaise = true;
        } else {
            $ispaise = false;
        }
        if (!$content_id) {
            $this->error('文章不存在');
        }
        $field = 'content_id,detail,title,create_time,hit,praise,video_url';
        $article = model('Information')->getinforart($content_id, $field);
        Db::name('content')->where('content_id', $content_id)->setInc('hit');
        Cache::set('num', $num);
        return $this->fetch('', ['ceshi'=>$num,'article'=>$article,'token'=>$token,'ispaise'=>$ispaise]);
    }
    // 关于我们
    public function about()
    {
        $content_id = 33;
        if (!$content_id) {
            $this->error('文章不存在');
        }
        $field = 'content_id,detail,title,create_time,hit,pic';
        $article = model('Information')->getinforart($content_id, $field);
        return $this->fetch('', ['article'=>$article]);
    }
    // 身高管理
    public function height()
    {
        $content_id = 3;
        if (!$content_id) {
            $this->error('文章不存在');
        }
        $field = 'content_id,detail,title,create_time,hit,pic';
        $article = db('frament')->field('*')->where(['frament_id'=>$content_id])->find();
        return $this->fetch('', ['article'=>$article]);
    }
    // 用户协议
    public function agreement()
    {
        $content_id = 2;
        if (!$content_id) {
            $this->error('文章不存在');
        }
        $field = 'content_id,detail,title,create_time,hit,pic';
        $article = db('frament')->field('*')->where(['frament_id'=>$content_id])->find();
        return $this->fetch('', ['article'=>$article]);
    }
    //身高预测
    public function heightForecas()
    {
        $uid = input('Id', 0, 'intval');
        if (!$uid) {
            $this->error('页面不存在');
            exit;
        }
        $data = db('heightForecast')->field('*')->where('uid', $uid)->find();
        $this->assign('data', $data);
        return $this->fetch('');
    }
}
