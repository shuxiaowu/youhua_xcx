<?php
namespace app\app\model;
use think\Db;
use think\Exception;

class User extends Base
{
    public function get_user_list(){
        return $this->all();
    }

    public function wechat_register($data=[]){
        try{
            Db::startTrans();
           $res1 = $this->insertGetId([
               'nickname'=>filterNickname($data['nickname']),
               'avatar'=>$data['avatar'],
               'sex'=>$data['sex'],
           ]);
           $res2 = Db::name('user_wechat')->insertGetId([
               'uid'=>$res1,
               'openid'=>$data['openid'],
               'unionid'=>$data['unionid'],
               'nickname'=>filterNickname($data['nickname']),
               'avatar'=>$data['avatar'],
               'gender'=>$data['sex'],
               'created_at'=>date('Y-m-d H:i:s'),
           ]);
           if($res1 && $res2){
               Db::commit();
               return $res1;
           }else{
               Db::rollback();
               return 0;
           }
        }catch (Exception $e){
            Db::rollback();
            return 0;
        }

    }

}
