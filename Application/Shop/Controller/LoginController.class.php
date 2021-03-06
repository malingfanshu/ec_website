<?php

/**
 * 登录注册控制器
 * @author 陈培捷
 * @lastModifyTime 2016/02/03 09:31
 */

namespace Shop\Controller;
use Think\Controller;

class LoginController extends CommonController{
    
    /**
     * 主方法（登录页面）
     */
    public function index(){
        $memberInfo = I('session.member_info');
        if(!empty($memberInfo)){ // 探测到已登录，重定向回主页
            redirect(U("Shop/Index/index"));
        }
        
        // 页面信息
        $pageInfo['title'] = C("MALL_NAME").'-登录';
        
        layout("Layout/layout_common2");
        
        $this->assign($pageInfo);
        $this->display('login2');
    }
    
    /**
     * 手机注册：第一步页面
     */
    public function registerPhoneStep1(){
        // 页面信息
        $pageInfo['title'] = C("MALL_NAME").'-注册';
        
        layout("Layout/layout_common");
        
        $this->assign($pageInfo);
        $this->display('register_phone_step1');
    }
    
    /**
     * 手机注册：第二步页面
     */
    public function registerPhoneStep2(){
        if(!empty(session('cellPhoneCodeStatus'))){
           // 页面信息
            $pageInfo['title'] = C("MALL_NAME").'-注册';
            $pageInfo['register_phone'] = session("cellPhone");
            
            layout("Layout/layout_common");

            $this->assign($pageInfo);
            $this->display('register_phone_step2'); 
        }else{
            $this->error('超时/未知错误',U('/Shop/Login/registerPhoneStep1','','',true),3);
        }
    }

    /**
     * 邮箱注册：第一步页面
     */
    public function registerEmailStep1(){
        // 页面信息
        $pageInfo['title'] = C("MALL_NAME").'-注册';
        
        layout("Layout/layout_common");
        
        $this->assign($pageInfo);
        $this->display('register_email_step1');
    }
    
    /**
     * 判断邮箱提交来的信息格式，OK的存入等待验证的会员准备表
     */
    public function registerEmailCheck(){
        $Validate = new \Org\Validate\Validate;
        
        $email = (string)I('post.email');
        $nickname = (string)I('post.nickname');
        $password = (string)I('post.password');
        $repassword = (string)I('post.repassword');
        $payPassword = (string)I('post.pay_password');
        $payRepassword = (string)I('post.pay_repassword');
        $birthday = (string)I('post.birthday');
        
        if(empty($email) || empty($nickname) || empty($password) || empty($repassword) || empty($payPassword) || empty($payRepassword)){
            $this->error("没有填完必填项"); 
        }
        
        if($password != $repassword){
           $this->error("两次登录密码不一致"); 
        }
        if($payPassword != $payRepassword){
            $this->error("两次支付密码不一致");
        }
        if($password == $payPassword){
            $this->error("登录密码不能和支付密码一样");
        }
        $arrValidate = array(
            array($email,'email','邮箱格式不正确'),
            array($nickname,'nickname','用户名格式不正确'),
            array($password,'password','密码格式不正确'),
            array($payPassword,'password','支付密码格式不正确'),
        );
        $result = $Validate->verifyMultiple($arrValidate);
        if($result['status']){
            $MemberAction = D("MemberAction");
            $result = $MemberAction->emailExist($email);
            if($result['status'] && $result['data']['status'] == '1'){
                $this->error("该账户已存在");
            }else{
                if($result['status'] && $result['data']['status'] == '6'){
                    $nowTime = (int)time();
                    $overTime = $nowTime - $result['data']['create_time'];
                    $validTime = (int)C('MEMBER_ACTIVE_VALID_TIME')*60;
                    if($overTime > $validTime){
                        $where['email_address'] = array('EQ',$email);
                        $result = $MemberAction->deleteMember($where);
                    }else{
                        $this->error("账户需要激活");
                    }
                }
            }
            
            // 密码的加密处理
            $password = $this->_getCompilePwd($password);
            $payPassword = $this->_getCompilePwd($payPassword);
            
            $SendMessage = D("SendMessage");
            $subject = "主题";
            $identification = (string)session_id().$nowTime;
            $content = "30分钟内，请到<font style='color:red'><a target='_blank' href=".U('/Shop/Login/registerEmailVerify',array('identification'=>$identification),'',true).">".U('/Shop/Login/registerEmailVerify',array('identification'=>$identification),'',true)."</a></font>完成注册";
            $result = $SendMessage->sendEmail($email,$subject,$content,$identification);
            if($result['status']){
                
                $insertData = array(
                    'nickname' => $nickname,
                    'email_address' => $email,
                    'password' => $password,
                    'pay_password' => $payPassword,
                    'create_time' => (string)time(),
                    'birthday' => $birthday,
                    'identification' => $identification,
                    'status' => '6',
                );
                $result = $MemberAction->insertNewUser($insertData);
                $this->success("邮件发送成功，请到目标邮箱中激活用户");
            }else{
                $this->error("邮件发送失败");
            }
            ;
        }else{
           if(!$result['status']){
               $this->error($result["info"]);
           } 
        }
    }
    
    /**
     * 激活邮箱注册的账号
     */
    public function registerEmailVerify(){
        if(!empty(I('get.identification'))){
            $MemberAction = D('MemberAction');
             $result = $MemberAction->activeMember(I('get.identification'));
             if($result['status']){
                 var_dump($result);
             }else{
                 var_dump('出现了不该出现的错误');
             }
        }else{
            $this->error("这不是你该来的地方");
        }
    }
    
    /**
     * 登录验证的处理
     */
    public function ajaxLoginCheck(){
        $MemberAction = D('MemberAction');
        if(!empty(I('post.user')) || !empty(I('post.pwd')) || !empty(I('post.verify'))){
//            $verify = I('post.verify');
//            $Ver = new \Think\Verify();
//            $result = $Ver->check($verify);
//            if(!$result){
//                $this->ajaxReturn(array('status'=>'false','info'=>'验证码有误','data'=>I('post.')));
//            }
            $user = I('post.user');
            $pwd = $this->_getCompilePwd(I('post.pwd'));
            $result = $MemberAction->generalLoginCheck($user,$pwd);
            if($result['status']){ // 如果判断登录成功
                $member_id = $result['data'];
                $field = 'member_id,nickname,avatar,cell_phone,email_address';
                $result = $MemberAction->getMemberInfo($member_id,$field);
                session('member_info',$result);
                $this->ajaxReturn(array('status'=>'true','info'=>'成功'));
            }else{
                if(!empty($result['code']) && $result['code'] == '6'){
                    $this->ajaxReturn(array('status'=>'false','code'=>$result['code'],'info'=>'账户没有激活'));
                }else{
                    $this->ajaxReturn(array('status'=>'false','info'=>'账户密码不匹配'));
                }
            }
        }else{
            $this->ajaxReturn(array('status'=>'false','info'=>'没有接收到数据'));
        }
    }
    
    public function temLogin(){
        $memberInfo = array(
            'member_id' => '1',
            'nickname' => 'ab_cd',
            'cell_phone' => '15577375746',
        );
        session('member_info',$memberInfo);
    }
    
    /**
     * 退出登录
     */
    public function loginOut(){
        session('member_info',null);
        redirect(U("Shop/Login/index"));
    }
    
    public function demo(){
        $MemberAction = D('MemberAction');
        $result = $MemberAction->getMemberInfo('1');
        var_dump($result);exit;
    }
    
    /**
     * ajax判断手机号是否存在
     */
    public function ajaxCheckPhoneExist(){
        if(!empty(I('post.phone'))){
            $returnValue = [];
            $MemberAction = D('MemberAction');
            $result = $MemberAction->phoneNumberExist(I('post.phone'));
            if($result['status']){
                $returnValue = ['status'=>false,'info'=>'手机号码已存在'];
            }else{
                $returnValue = ['status'=>true,'info'=>'手机号码可使用'];
            }
            $this->ajaxReturn($returnValue);
        }else{
            $this->ajaxReturn(['status'=>'false','info'=>'失败']);
        }
    }
    
    /**
     * ajax形式，请求获得手机验证码
     */
    public function ajaxGetSendSmsCode(){
        $Validate = new \Org\Validate\Validate();
        if(!empty(I('post.phone')) || $Validate->verify('cell_phone',I('post.phone'))){
            $SendMessage = D('SendMessage');
            $result = $SendMessage->sendSms(I('post.phone'),'','捷商城的注册');
            if($result){
                $this->ajaxReturn(['status'=>'true','info'=>'成功','data'=>$result]);
            }else{
                $this->ajaxReturn(['status'=>'false','info'=>'失败1']);
            }
        }else{
            $this->ajaxReturn(['status'=>'false','info'=>'失败2']);
        }
    }
    
    /**
     * ajax形式，判断手机短信验证码
     */
    public function ajaxJudgeSmsCode(){
        $Validate = new \Org\Validate\Validate();
        $SendMessage = D('SendMessage');
        if(!empty(I('post.phone')) ||!empty(I('post.code')) || $Validate->verify('cell_phone',I('post.phone'))){
            $lastSmsInfo = $SendMessage->getSmsLastInfo(I('post.phone'));
            $nowTime = time();
            $lastTime = $lastSmsInfo['send_time'];
            if(($nowTime - $lastTime) > 90){
                $this->ajaxReturn(['status'=>'false','info'=>'超时']);
            }
            if(I('post.code') == $lastSmsInfo['code']){
                session("cellPhoneCodeStatus","true");
                session("cellPhone",I('post.phone'));
                $this->ajaxReturn(['status'=>'true','info'=>'验证成功','url'=>U('Shop/Login/registerPhoneStep2','','',true)]);
            }else{
                $this->ajaxReturn(['status'=>'false','info'=>'验证码不对']);
            }
        }else{
            $this->ajaxReturn(['status'=>'false','info'=>'失败2']);
        }
    }
    
    /**
     * ajax形式，判断手机注册第二步的填写信息，通过后存进数据库
     */
    public function ajaxRegisterPhoneStep2Check(){
        if(session('?cellPhoneCodeStatus') || session('?cellPhone')){
            if(!empty(I('post.nickname')) || !empty(I('post.password')) || !empty(I('post.repassword')) || !empty(I('post.verify')) || !empty(I('post.pay_password'))|| !empty(I('post.pay_repassword'))){
                $verify = I('post.verify');
                $Ver = new \Think\Verify();
                $result = $Ver->check($verify);
                if(!$result){
                    $this->ajaxReturn(['status'=>'false','info'=>'验证码有误']);exit;
                }
                if(I('post.password') != I('post.repassword')){
                    $this->ajaxReturn(['status'=>'false','info'=>'两次密码不一致']);
                }
                if(I('post.pay_password') != I('post.pay_repassword')){
                    $this->ajaxReturn(['status'=>'false','info'=>'两次支付密码不一致']);
                }
                $nickname = I('post.nickname');
                $pwd = $this->_getCompilePwd(I('post.password'));
                $birthday = I('post.birthday');
                $payPassword = $this->_getCompilePwd(I('post.pay_password'));
                $birthday = !empty(I('post.birthday'))?I('post.birthday'):'';
                
                $MemberAction = D('MemberAction');
                $result = $MemberAction->phoneNumberExist(session('?cellPhone'));
                if($result['status']){ // 如果手机号已存在
                    $this->ajaxReturn(['status'=>'false','info'=>'手机号已被使用']);
                }else{ // 如果没被使用过
                    $result = $MemberAction->nicknameExist($nickname);
                    if($result['status']){ // 如果昵称已经被使用
                        $this->ajaxReturn(['status'=>'false','info'=>'昵称被使用']);
                    }
                    $data = array(
                        'nickname' => $nickname,
                        'cell_phone' => session('cellPhone'),
                        'password' => $pwd,
                        'pay_password' =>$payPassword,
                        'create_time' => time(),
                        'birthday' => $birthday,
                        'status' => '1',
                    );
                    $result = $MemberAction->insertNewUser($data);
                    if($result){
                        $this->ajaxReturn(['status'=>'true','info'=>'注册成功','data'=>$data]);
                    }else{
                        $this->ajaxReturn(['status'=>'false','info'=>'未知原因注册失败']);
                    }
                    
                }

            }else{
                $this->ajaxReturn(['status'=>'false','info'=>'必填信息不全','data'=>I('post.')]);
            }
        }else{
            $this->ajaxReturn(['status'=>'false','info'=>'超时或不被允许','data'=>I('session.')]);
        }
    }
    
    /*******************************内部方法***************************************/
    
    /**
     * 密码的加密处理
     * @param string $password 真实密码
     * @return string 加密后的密码
     */
    private function _getCompilePwd($password){
        return md5(C('MD5_PREFIX').$password);
    }
    
}

