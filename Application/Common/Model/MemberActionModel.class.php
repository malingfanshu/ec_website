<?php

/**
 * 会员行为模型
 * @author 陈培捷
 * @lastModifyTime 2016/02/01 15:37
 */

namespace Common\Model;
use Think\Model;

class MemberActionModel extends Model{
    protected $tableName = 'empty'; // 设空表
    
    /**
     * 通常的账户密码登录校验
     * @param string $user 用户昵称、手机号、邮箱均可
     * @param string $pwd 密码
     * @return boolean 
     */
    public function generalLoginCheck($user,$pwd){
        $where['nickname'] = array('EQ',$user);
        $where['password'] = array('EQ',$pwd);
        $field = 'nickname,password';
        $result = $this->table('ec_member')->where($where)->field($field)->select();
        if(!empty($result)){
            return true;
        }else{
            $where['nickname'] = '';
            $where['cell_phone'] = array('EQ',$user);
            $field = 'cell_phone,password';
            $result = $this->table('ec_member')->where($where)->field($field)->select();
            if(!empty($result)){
                return true;
            }else{
                $where['cell_phone'] = '';
                $where['email_address'] = array('EQ',$user);
                $field = 'email_address,password';
                $result = $this->table('ec_member')->where($where)->field($field)->select();
                if(!empty($result)){
                    return true;
                }else{ // 没有该用户
                    return false;
                }
            }
        }
    }
    
    /**
     * 判断手机号码是否存在
     * @param string $cellPhone 手机号码
     * @return boolean 
     */
    public function phoneNumberExist($cellPhone){
        $where['cell_phone'] = array("EQ",$cellPhone);
        $field = 'cell_phone';
        $result = $this->table('ec_member')->where($where)->field($field)->select();
        if($result){ // 该手机号码已存在
            return true;
        }else{ // 手机号码未被使用
            return false;
        }
    }
    
    /**
     * 插入新用户数据
     * @param array|obj $data 要插入的信息
     * @return boolean
     */
    public function insertNewUser($data){
        $result = $this->table('ec_member')->data($data)->add();
        if($result){
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 判断用户昵称有没有被使用
     * @param string $nickname 用户昵称
     * @return boolean
     */
    public function nicknameExist($nickname){
        $where['nickname'] = array("EQ",$nickname);
        $field = 'nickname';
        $result = $this->table('ec_member')->where($where)->field($field)->select();
        if($result){ // 如果用户昵称已经被使用
            return $result;
        }else{ // 用户昵称没有被使用
            return $result;
        }
    }
    
}