<?php
/**
 * 验证类
 * @author 陈培捷
 * @lastModifyTime 2016/02/02 16:16
 */

namespace Org\Validate;

class Validate{
    
    private $dataType = array(
        "email" => '/^([.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\\.[a-zA-Z0-9_-])+/',
        "cell_phone" => '/^1[3|4|5|7|8]\d{9}$/',
        "nickname" => '/^[0-9a-zA-Z_]{6,16}$/', // 昵称只能使用数字、字母及下划线，6位到16位
        "password" => '/^[0-9a-zA-Z_]{6,16}$/', // 密码规则同上
        "required" => '/^[0-9a-zA-Z_]{1,}$/', // 至少一位，只能使用数字、字母、下划线
    );
    
    /**
     * 正则验证的方法
     * @param string $type 要验证的类型
     * @param string $data  要验证的数据
     * @return boolean
     */
    public function verify($type,$data){
        $returnValue = false;
        foreach($this->dataType as $key=>$value){
            if((string)$type == $key){
                $result = preg_match($value,$data);
                if($result){
                    $returnValue = true;
                }else{
                    $returnValue = false;
                }
                break;
            }else{
                continue;
            }
        }
        return $returnValue;
    }
    
    /**
     * 正则验证格式方法（多个）
     * @param array $validateArray 二维数组，示例格式:array(array('111111111','cell_phone','该手机号码不正确'),array(),array()......)
     * @return array 一维数组，第一个参数是成功与否，第二个参数是返回信息
     */
    public function verifyMultiple($validateArray){
        if(is_array($validateArray)){
            foreach($validateArray as $key=>$value){
                if(!array_key_exists((string)$value[1],$this->dataType)){
                    return array("status"=>false,"info"=>$value[0]."验证类型不存在");
                }
                $result = $this->verify($value[1],$value[0]);
                if(!$result){
                    return array("status"=>false,"info"=>$value[2]);
                }
            }
            return array("status"=>true,"info"=>"验证成功");
        }else{
            return array("status"=>false,"info"=>"格式不正确");
        }
    }
}
