<?php

namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Validate;
use think\Cache;

define('HOST', 'http://edg.leteng.net');
class Information extends Common
{
    protected $backData;
    protected $uid;
    
    protected function _initialize()
    {
        parent::_initialize();
    }
    //
    public function index()
    {
        $module_id = 24;
        $type  = model('Information') ->getinfortypeid($module_id);
        $content = model('Information') ->getinforlistid($type['class_id']);
        foreach ($content as $key => $value) {
            $content[$key]['typename'] = model('Information') ->getinfortypename($value['class_id']);
            $content[$key]['list'] = model('Information') ->getinforlist($value['class_id']);
        }
        if (!empty($content)) {
            $this->backData['code'] = 0;
            $this->backData['msg']  = '数据返回成功';
            $this->backData['data']  =  $content;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '数据返回失败';
            $this->backData['data']  = [];
            return json($this->backData);
            exit;
        }
    }
    // 图文
    public function picText()
    {
        $module_id = 22;
        $page = input('page', 1, 'intval');
        $pagesize = input('pagesize', 10, 'intval');
        $content = model('Information') ->getinforlist($module_id, $page, $pagesize);
        $next = model('Information') ->getinforlist($module_id, $page+1);
        if (!empty($content)) {
            $this->backData['code'] = 0;
            $this->backData['msg']  = '数据返回成功';
            $this->backData['data']['list']  =  $content;
            if ($next) {
                $this->backData['data']['isnext'] =1;
            } else {
                $this->backData['data']['isnext'] =0;
            }
           
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '数据返回失败';
            $this->backData['data']  = [];
            return json($this->backData);
            exit;
        }
    }
    // 视频
    public function videoText()
    {
        $module_id = 23;
        $page = input('page', 1, 'intval');
        $pagesize = input('pagesize', 10, 'intval');
        $content = model('Information') ->getinforlist($module_id, $page, $pagesize);
        $next = model('Information') ->getinforlist($module_id, $page+1);
        if (!empty($content)) {
            $this->backData['code'] = 0;
            $this->backData['msg']  = '数据返回成功';
            $this->backData['data']['list']  =  $content;
            if ($next) {
                $this->backData['data']['isnext'] =1;
            } else {
                $this->backData['data']['isnext'] =0;
            }
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '数据返回失败';
            $this->backData['data']  = [];
            return json($this->backData);
            exit;
        }
    }
    //话题文章详情
    public function newsArticle()
    {
        $content_id = Request::instance()->param('content_id', 0);
        $field = 'detail,title,create_time,hit,praise';
        $article = model('Information')->getinforart($content_id, $field);
        Db::name('content')->where('content_id', $content_id)->setInc('hit', 1);
        
        return $this->fetch('', ['article'=>$article]);
    }
    // 点赞
    public function praiseClick()
    {
        $content_id = Request::instance()->param('content_id', 0);
        $prais_count = model('Information')->getinforart($content_id);
        if ($this->uid) {
            $map = array(
                'content_id'=>$content_id,
                'uid'=>$this->uid,
                'addtime'=>time(),
            );
            if (model('Information')->isPaise($content_id, $this->uid)) {
                $data = model('Information')->delectPaise(model('Information')->isPaise($content_id, $this->uid));
                if ($prais_count['praise']>0) {
                    Db::name('content')->where('content_id', $content_id)->setDec('praise', 1);
                }
                $this->backData['code'] = -1;
                $this->backData['msg']  = '取消点赞';
                $this->backData['data']  = $prais_count['praise'];
                return json($this->backData);
            } else {
                $data = model('Information')->setPaise($map);
                Db::name('content')->where('content_id', $content_id)->setInc('praise', 1);
                $this->backData['code'] = 0;
                $this->backData['msg']  = '点赞成功';
                $this->backData['data']  = $prais_count['praise'];
                return json($this->backData);
            }
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '请登录';
            $this->backData['data']  = $prais_count['praise'];
            return json($this->backData);
        }
    }
    //取消点赞
    public function cancel()
    {
        $content_id = Request::instance()->param('content_id', 0);
        $prais_count = model('Information')->getinforart($content_id);
        if (!$content_id) {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '参数有误';
            return json($this->backData);
        }
        if ($this->uid) {
            $map = array(
                'content_id'=>$content_id,
                'uid'=>$this->uid,
                'addtime'=>time(),
            );
            if (model('Information')->isPaise($content_id, $this->uid)) {
                $data = model('Information')->delectPaise(model('Information')->isPaise($content_id, $this->uid));
                if ($prais_count['praise']>0) {
                    Db::name('content')->where('content_id', $content_id)->setDec('praise', 1);
                    model('Information')->delectPaise($content_id, $this->uid);
                }
                $this->backData['code'] = 0;
                $this->backData['msg']  = '取消点赞成功';
                return json($this->backData);
            }
        } else {
            $this->backData['code'] = 1004;
            $this->backData['msg']  = '请登录';
            return json($this->backData);
        }
    }
    // 营养师
    public function heathlEr()
    {
        $class_id = 10;
        $num = Cache::get('num') ? Cache::get('num') : 0;
        $arr_content_id = array();
        $content = model('Information') ->getinforlist($class_id);
        $content_lenght = count($content);
        foreach ($content as $key => $value) {
            $arr_content_id[$key] = $value['content_id'];
        }
        if ($num < $content_lenght-1) {
            $num +=1;
            Cache::set('num', $num, 3600);
        } else {
            $num = 0;
            Cache::rm('num');
        }
        $field = 'pic,tag,detail,weixin,title';
        $article = model('Information')->getinforart($arr_content_id[$num], $field);

        // $content_id = Request::instance()->param('content_id', 0);
       
        // model('information')->getinforart($content_id, $field);
        if (!empty($article)) {
            $this->backData['code'] = 0;
            $this->backData['msg']  = '返回成功';
            $this->backData['data']  =$article;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '返回失败';
            $this->backData['data']  = [];
            return json($this->backData);
            exit;
        }
    }
    //消息中心
    public function informationCenter()
    {
        $data = model('Home')->informationCenter();
        if ($data) {
            $this->backData['code'] = 0;
            $this->backData['msg']  = '返回成功';
            $this->backData['data']['list']  = $data;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '获取信息失败';
            $this->backData['data']  = [];
            return json($this->backData);
            exit;
        }
    }
    //消息中心条数
    public function countInfoCenter()
    {
        $data = model('Home')->countInfoCenter();
        $day = model('Sigin')->getContinewDay();
        $this->backData['code'] = 0;
        $this->backData['msg']  = '返回成功';
        $this->backData['data']['count']  = $data ? $data : 0;
        $this->backData['data']['day'] = $day ? $day : 0;
        return json($this->backData);
        exit;
    }
    //消息详情
    public function articleInfoCenter()
    {
        $content_id = input('content_id', 0, 'intval');
        $token = Request::instance()->param('token');
        if ($content_id) {
            $this->backData['code'] = 0;
            $this->backData['msg']  = '返回成功';
            $this->backData['data']['URL']  = HOST.'/api/news/index/content_id/'.$content_id.'/token/'.$token;
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '返回失败';
            $this->backData['data']['URL']  = '';
            return json($this->backData);
            exit;
        }
    }
    // 关于我们
    public function about()
    {
        $content_id = 1;
        if ($content_id) {
            $this->backData['code'] = 0;
            $this->backData['msg']  = '返回成功';
            $this->backData['data']['URL']  = HOST.'/api/news/about';
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '返回失败';
            $this->backData['data']['URL']  = '';
            return json($this->backData);
            exit;
        }
    }
    // 身高管理
    public function heightbody()
    {
        $content_id = 1;
        if ($content_id) {
            $this->backData['code'] = 0;
            $this->backData['msg']  = '返回成功';
            $this->backData['data']['URL']  = HOST.'/api/news/height';
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '返回失败';
            $this->backData['data']['URL']  = '';
            return json($this->backData);
            exit;
        }
    }
    // 身高管理
    public function agreement()
    {
        $content_id = 1;
        if ($content_id) {
            $this->backData['code'] = 0;
            $this->backData['msg']  = '返回成功';
            $this->backData['data']['URL']  = HOST.'/api/news/agreement';
            return json($this->backData);
            exit;
        } else {
            $this->backData['code'] = 1;
            $this->backData['msg']  = '返回失败';
            $this->backData['data']['URL']  = '';
            return json($this->backData);
            exit;
        }
    }
}
