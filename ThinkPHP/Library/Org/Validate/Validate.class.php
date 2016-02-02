<?php
/**
 * 验证类
 * @author 陈培捷
 * @lastModifyTime 2016/01/29 13:46
 */

namespace Org\Validate;

class Validate{
    
    private $dataType = [
        "email"=>'/^([.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\\.[a-zA-Z0-9_-])+/',
        "cell_phone"=>'/^1[3|4|5|7|8]\d{9}$/',
    ];
    
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
                $returnValue = true;
                break;
            }else{
                continue;
            }
        }
        return $returnValue;
    }
    
}
