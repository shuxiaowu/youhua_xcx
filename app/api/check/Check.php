<?php
 
namespace app\api\check;

use think\Request;

class Check
{
    public function appBegin($input, $sign, $timestamp)
    {
        if (!$sign) {
            echo json_encode(["code" => 1004,'msg'=>"sign参数异常"]);
            die;
        }
        if (!$timestamp) {
            echo json_encode(["code" => 1005,'msg'=>"timestamp参数异常"]);
            die;
        }
        if (abs(strtotime($timestamp) - time()) >=300) {
            echo json_encode(["code" => 1006,'msg'=>"当前请求请求超时"]);
            die;
        }
        $input = input();
        $input['timestamp'] = $timestamp;
        //参数没传值时,该参数不参与签名
        foreach ($input as $k => $v) {
            if (null == $v && $v !== 0) {
                unset($input[$k]);
            }
        }
        $signServer = $this->getSign($input);
 
        if ($signServer != $sign) {
            echo json_encode(["code" => 1007,'msg'=>"非法攻击,参数被篡改"]);
            die;
        }
    }
 
 
    /*
     *  生成sign签名
     */
    private function getSign($data)
    {
        ksort($data);
        $String = $this->formatBizQueryParaMap($data, false);
        $String = $String."&key=shuxiaowu";
        $result = strtoupper(md5($String));
        return $result;
    }
 
    //将数组转成uri字符串
    private function formatBizQueryParaMap($paraMap, $urlencode)
    {
        $buff = "";
        ksort($paraMap);
        foreach ($paraMap as $k => $v) {
            if ($urlencode) {
                $v = urlencode($v);
            }
            $buff .= $k . "=" . $v . "&";
        }
        $reqPar;
        if (strlen($buff) > 0) {
            $reqPar = substr($buff, 0, strlen($buff)-1);
        }
        return $reqPar;
    }
}
