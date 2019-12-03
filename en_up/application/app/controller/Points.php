<?php
namespace app\app\controller;

use function Sodium\add;
use think\Db;
use think\Exception;

class Points extends ControllerBase
{
    /**
     * 前缀控制器列表
     */
    protected $beforeActionList = [
        'need_login' => ['only' => [
//            'records',
        ]],
    ];
    /**
     * 积分明细
     */
    public function records(){
        $res = db('score_details')->where('id',$this->uid)->where('status',1)->select()->toArray();
        return $this->success($res);
    }
    /**
     * 积分兑换
     */
    public function rewards_points(){
        $score = $this->request->param('score','');
        $address = $this->request->param('address','');
        $real_name = $this->request->param('real_name','');

        $res = db('user')->where('id',$this->uid)->find();
        if(empty($res)){
            return $this->error('用户不存在');
        }
        if($score>$res->score){
            return $this->error('积分不足无法兑换');
        }

        try{
            Db::startTrans();
            $res1 = Db::name('user_address')->insertGetId(['uid'=>$this->uid,'phone'=>$res['phone'],'address'=>$address,'real_name'=>$real_name,'created_at'=>date('Y-m-d H;i:s'),'updated_at'=>date('Y-m-d H;i:s')]);
            $res2 = Db::name('user')->where('id',$this->uid)->setDec('score',$score);
            if($res1 && $res2){
                Db::commit();
                return $this->success([],'兑换成功');
            }else{
                Db::rollback();
                return $this->error('兑换失败');
            }
        }catch (Exception $e){
            Db::rollback();
            return $this->error('兑换失败');
        }
    }
}
