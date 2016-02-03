<?php

/**
 * 会员行为模型
 * @author 陈培捷
 * @lastModifyTime 2016/02/03 10:29
 */

namespace Common\Model;
use Think\Model;

class MemberActionModel extends Model{
    protected $autoCheckFields = false; // 设置不自动检测表信息
    
    /**
     * 通常的账户密码登录校验
     * @param string $user 用户昵称、手机号、邮箱均可
     * @param string $pwd 密码
     * @return boolean 
     */
    public function generalLoginCheck($user,$pwd){
        $where['status'] = array('EQ','1'); // 1为正常用户，正常用户才能登陆
        
        $where['nickname'] = array('EQ',$user);
        $where['password'] = array('EQ',$pwd);
        $field = 'nickname,password';
        $result = $this->table('ec_member')->where($where)->field($field)->select();
        if(!empty($result)){
            return array('status'=>true,'info'=>'验证通过');
        }else{
            unset($where['nickname']);
            $where['cell_phone'] = array('EQ',$user);
            $field = 'cell_phone,password';
            $result = $this->table('ec_member')->where($where)->field($field)->select();
            if(!empty($result)){
                return array('status'=>true,'info'=>'验证通过');
            }else{
                unset($where['cell_phone']);
                $where['email_address'] = array('EQ',$user);
                $field = 'email_address,password';
                $result = $this->table('ec_member')->where($where)->field($field)->select();
                if(!empty($result)){
                    return array('status'=>true,'info'=>'验证通过');
                }else{ // 没有该用户或未激活
                    $where['status'] = array('EQ','6');
                    $result = $this->table('ec_member')->where($where)->field($field)->select();
                    if(!empty($result)){
                        return array('status'=>false,'code'=>'6','info'=>'用户未激活');
                    }else{
                        return array('status'=>false,'info'=>'没有该用户');
                    }
                }
            }
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
            return array("status"=>true,'info'=>'用户昵称已经被使用');
        }else{ // 用户昵称没有被使用
            return array("status"=>false,'info'=>'用户昵称没有被使用');
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
            return array("status"=>true,'info'=>'手机号码已存在');
        }else{ // 手机号码未被使用
            return array("status"=>false,'info'=>'手机号码未被使用');
        }
    }
    
    /**
     * 判断邮箱是否存在
     * @param string $email 邮箱地址
     * @return array
     */
    public function emailExist($email){
        $where['email_address'] = array("EQ",$email);
        $field = 'email_address,status,create_time';
        $result = $this->table('ec_member')->where($where)->field($field)->select();
        if($result){ // 该邮箱号码已存在
            return array("status"=>true,'info'=>'邮箱已经被使用','data'=>array('status'=>$result[0]['status'],'create_time'=>$result[0]['create_time']));
        }else{ // 邮箱未被使用
            return array("status"=>false,'info'=>'邮箱未被使用');
        }
    }
    
    /**
     * 判断会员信息的唯一性
     * @param array $data 要插入的数据
     * @return array
     */
    public function uniqueExist($data){
        $result = $this->emailExist($data['email']);
        if($result['status']){
            return array("status"=>false,'info'=>'该邮箱号码已存在');
        }
        $result = $this->nicknameExist($data['nickname']);
        if($result['status']){
            return array("status"=>false,'info'=>'该昵称已存在');
        }
        $result = $this->phoneNumberExist($data['cell_phone']);
        if($result['status']){
            return array("status"=>false,'info'=>'该手机号码已存在');
        }
        return array("status"=>true,'info'=>'通过验证');
    }
    
    /**
     * 根据有效时间的限制判断是否激活用户
     * @param string $identification 标识
     * @param int $validTime 有效时间，单位min(分钟)
     * @return array
     */
    public function activeMember($identification){
        $nowTime = (int)time();
        $validTime = (int)C('MEMBER_ACTIVE_VALID_TIME')*60;
        $field = 'create_time';
        $where['identification'] = array('EQ',$identification);
        $result = $this->table('ec_member')->where($where)->field($field)->select();
        if(empty($result)){
            return array('status'=>false,"info"=>'失效');
        }else{
            $createTime = $result[0]['create_time'];
            $overTime = $nowTime - $createTime;
            if($overTime > $validTime){
                $result = $this->table('ec_member')->where($where)->delete();
                return array('status'=>false,"info"=>'失效');
            }else{
                $updateData = array(
                    'status' => '1',
                );
                $result = $this->table('ec_member')->where($where)->save($updateData);
                if($result){
                    return array('status'=>true,"info"=>'激活成功');
                }else{
                    return array('status'=>false,"info"=>'激活失败');
                }
            }
        }
    }
    
    /**
     * 删除用户
     * @param type $where 条件
     * @return type
     */
    public function deleteMember($where){
        $result = $this->table('ec_member')->where($where)->delete();
        if($result){
            return array('status'=>true,"info"=>'删除成功');
        }else{
            return array('status'=>false,"info"=>'删除失败');
        }
    }
    
}