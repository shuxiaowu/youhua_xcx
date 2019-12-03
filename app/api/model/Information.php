<?php
namespace app\api\model;

use think\Model;

class Information extends Model
{
     
    /**
     * [getinforlist 获取文章列表]
     * @param  $class_id 资讯类别
     * @return $data 返回数据
     */
    public function getinforlist($class_id, $page=1, $pagesize=10)
    {
        $data = db('content')->field('content_id,title,pic,video_url,create_time,hit,praise,description')->where(['class_id'=>$class_id])->page($page, 10, $pagesize)->order('sortid ASC,create_time DESC,content_id DESC')->select();
        if ($data) {
            foreach ($data as $key => $value) {
                $data[$key]['create_time'] = date('Y-m-d', $value['create_time']);
            }
        }
        return empty($data) ? [] : $data;
    }
    /**
     * [getinfortypeid  获取类别id]
     * @param  $module_id 资讯类别
     * @return $data 返回数据
     */
    public function getinfortypeid($module_id)
    {
        $data = db('catagory')->field('class_id,class_name')->where(['module_id'=>$module_id,'pid'=>0])->find();
        return empty($data) ? [] : $data;
    }
    /**
     * [getinforlistid  获取类别id]
     * @param  $list list
     * @return $data 返回数据
     */
    public function getinforlistid($pid)
    {
        $data = db('catagory')->field('class_id')->where(['pid'=>$pid])->select();
        return empty($data) ? [] : $data;
    }
    /**
     * [getinfortypename  获取类别名称]
     * @param  $module_id 资讯类别
     * @return $data 返回数据
     */
    public function getinfortypename($class_id)
    {
        $data = db('catagory')->field('class_id,class_name')->where(['class_id'=>$class_id])->find();
        return empty($data) ? '' : $data['class_name'];
    }
    /**
     * [getinforart  获取文章]
     * @param  $content_id 文章id
     * @param  $field 字段
     * @return $data 返回数据
     */
    public function getinforart($content_id, $field ='*')
    {
        $data = db('content')->field($field)->where(['content_id'=>$content_id])->find();
        $data['create_time'] = date('Y-m-d h:i:s', $data['create_time']);

        return empty($data) ? [] : $data;
    }
    /**
     * [getinforcount  获取文章]
     * @param  $class_id 文章id
     * @param  $field 字段
     * @return $data 返回数据
     */
    public function getinforcount($class_id, $field ="*")
    {
        $count = db('content')->field($field)->where(['class_id'=>$class_id])->count();
        return $count ?  $count : 0;
    }
    /**
     * [setPaise  设置点赞]
     * @param  $map 添加字段
     * @return $data bool
     */
    public function setPaise($map)
    {
        $data = db('ext_praise')->insertGetId($map);
        return $data ?  true : false;
    }
    /**
     * [delectPaise  设置点赞]
     * @param  $content_id,$uid
     * @return $data bool
     */
    public function delectPaise($content_id, $uid)
    {
        $data = db('ext_praise')->delete(['content_id'=>$content_id,'uid'=>$uid]);
        return $data ?  true : false;
    }

    /**
     * [isPaise  判断点赞]
     * @param  $content_id
     * @param  $uid
     * @return $data bool
     */
    public function isPaise($content_id, $uid)
    {
        $data = db('ext_praise')->where(['content_id'=>$content_id,'uid'=>$uid])->find();
        return $data ?  $data['data_id'] : 0;
    }
    /**
     * [isPaise  点赞列表]
     * @param  $content_id
     * @param  $uid
     * @return $data bool
     */
    public function paiseList($uid, $page, $pagesize)
    {
        $data = db('ext_praise')->where(['uid'=>$uid])->select();
        foreach ($data as $key => $value) {
            $content = getcontent($value['content_id']);
            $data[$key]['addtime'] =date('Y-m-d h:i:d', $value['addtime']);
            $data[$key]['title'] = $content['title'];
            $data[$key]['pic'] = $content['pic'];
            $data[$key]['description'] = $content['description'];
            $data[$key]['create_time'] =date('Y-m-d', $content['create_time']);
            $data[$key]['hit'] = $content['hit'];
            $data[$key]['praise'] = $content['praise'];
            $data[$key]['class_id'] = $content['class_id'];
        }
        return $data ?  $data : '';
    }
}
