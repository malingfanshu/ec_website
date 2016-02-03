<?php

/**
 * 消息发送模型
 * @author 陈培捷
 * @lastModifyTime 2016/02/03 09:54
 */

namespace Common\Model;
use Think\Model;

class SendMessageModel extends Model{
    
    protected $tableName = 'system_message';
    
    /**
     * 短信发送的方法（单发）
     * @param string $cellPhone 目标手机号码
     * @param string $smsSign 短信签名（允许的值：http://www.alidayu.com/admin/service/sign）
     * @param string $product 短信主体内容
     * @param type $template 短信模板（允许的值：http://www.alidayu.com/admin/service/tpl）
     * @return stirng json格式的字符串
     */
    public function sendSms($cellPhone = '',$smsSign = '',$product = '',$template = 'SMS_4756069'){
        // 测试默认值
//        $cellPhone = '15577375746';
        $smsSign = '身份验证';
//        $product = '陈培捷商城的（我手机号被限制了，用别的测试一下）';
        
        if(empty($cellPhone)){
            return false; // 缺少参数$cellphone
        }
        if(!@include(LIB_PATH."Org/Aliyun/TopSdk.php")){ //引入淘宝SDK入口文件
            return false; // 找不到对应文件
        }
        
        $validTime = (int)60; // 该次请求验证码有效时间
        $code = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9); // 6位随机验证码
        
        // 60S不能再次发送
        $nowTime = (int)time();
        $Mo = M('system_message');
        $where['method'] = array('EQ','sms'); 
        $where['target'] = array('EQ',$cellPhone); 
        $result = $Mo->field('send_time')->where($where)->order('send_time desc')->limit(1)->find();
        $lastTime = (int)$result['send_time'];
        $remainingTime = $nowTime - $lastTime;
        $fail_data = [
            'remainingTime'=>$remainingTime,
        ];
        if(($remainingTime) < $validTime){
            return false; // 特定时间内不能重复发送手机验证码
        }
        
        // 调用阿里大鱼API进行发送操作
        $appkey = C('TAOBAO_KEY');
	$secret = C('TAOBAO_SECRET');
        $c = new \TopClient;
	$c->appkey = $appkey;
	$c->secretKey = $secret;
	$req = new \AlibabaAliqinFcSmsNumSendRequest;
//	$req->setExtend("123456");
	$req->setSmsType("normal");
	$req->setSmsFreeSignName($smsSign);
	$req->setSmsParam(json_encode(['code'=>$code,'product'=>$product]));
	$req->setRecNum($cellPhone);
	$req->setSmsTemplateCode($template);
	$resp = (array)$c->execute($req);
        $resp['result'] = (array)$resp['result'];
        // 成功后存入数据库中做记录
        if(!empty($resp['result']['success']) && $resp['result']['success'] == 'true'){ 
            $nowTime = (int)time();
            $insertData = [
                'method' => 'sms',
                'type' => 'code',
                'target' => (string)$req->getRecNum(),
                'identification' => (string)$resp['request_id'],
                'title' => (string)$req->getSmsFreeSignName(),
                'content' => (string)$req->getSmsParam(),
                'send_time' => $nowTime,
            ];
            $Mo->data($insertData)->add();
            $succ_data = [
                'smsCode' => $code,
                'validTime' => $validTime,
                'identification' => (string)$resp['request_id'],
            ];
            return $succ_data; // 发送成功
        }else{
            return false; // 阿里大鱼API导致的发送失败
        }
    }
    
    /**
     * 发送邮件（单发）
     * @param string $targetEmail 目标邮箱地址
     * @param string $subject 邮件主题
     * @param string $body 邮件内容（可用HTML格式）
     * @return array/boolean 发送信息（数组）或者false
     */
    public function sendEmail($targetEmail = '',$subject = '',$body = '',$identification = ''){
        // 测试默认值
//        $targetEmail = '18378305258@163.com';
//        $subject = '测试标题';
//        $body = '测试内容';
        
        if(empty($targetEmail)){
            return array("status"=>false,"info"=>"缺少目标邮件地址"); // 缺少$targetEmail
        }
        
        if(!@include(LIB_PATH."Org/PHPMailer/PHPMailerAutoload.php")){ // 引入PHPMailer入口文件
            return array("status"=>false); // 找不到对应文件
        }
        
        $Mo = M('system_message');
        $nowTime = (int)time();
        $validTime = (int)30; // 该次发送请求有效时间
        $where['method'] = array('EQ','email');
        $where['target'] = array('EQ',$targetEmail);
        $result = $Mo->field('send_time')->where($where)->order('send_time desc')->limit(1)->find();
        $lastTime = $result['send_time'];
        $remainingTime = $nowTime - $lastTime;
        if($remainingTime < $validTime){
            return array("status"=>false,"info"=>"特定时间不能向同一邮箱账号重复发送"); // 特定时间不能向同一邮箱账号重复发送
        }
        
        $mail=new \PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = C('NETEASE_SMTP_HOST');  // smtp服务器
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = C('NETEASE_USERNAME');                 // SMTP username（邮箱账户名）
        $mail->Password = C('NETEASE_PASSWORD');                           // SMTP password（邮箱密码）
        $mail->SMTPSecure = C('NETEASE_SMTP_SECURE');                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = C('NETEASE_PORT');                                    // （实际端口号参照上图，163邮箱非ssl协议端口为25）
        $mail->CharSet = C('NETEASE_CHARSET');                             // 设置发送内容的编码
        $mail->setFrom(C('NETEASE_FROM'),C('NETEASE_NICKNAME'));         // 从哪个邮箱发送，一般和Username一致
        $mail->addAddress($targetEmail, 'Joe User');     // Add a recipient（发到哪个邮箱）
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;
        if(!$mail->send()) {
            return array("status"=>false,"info"=>"条件满足，尝试发送失败"); // 从PHPMailer导致的发送失败
        } else {
            $nowTime = (int)time();
            $identification = !empty($identification)?$identification:(string)session_id().$nowTime;
            $insertData = array(
                'method' => 'email',
                'type' => 'verification',
                'target' => $targetEmail,
                'identification' => $identification,
                'title' => $subject,
                'content' => $body,
                'send_time' => $nowTime,
            );
            $Mo->data($insertData)->add();
            $succ_data = array(
                'targetEmail' => $targetEmail,
                'validTime' => $validTime,
                'identification' => $identification,
            );
            return array("status"=>true,"info"=>"发送成功","data"=>$succ_data); // 发送成功
        }
    }
    
    /**
     * 获取对某手机号最近一次发送短信的时间
     * @param string $cell_phone 手机号码
     * @return string 发送时间
     */
    public function getSmsLastSendTime($cell_phone){
        $where['cell_phone'] = array('EQ',$cell_phone);
        $result = $this->field('send_time')->where($where)->order('send_time desc')->limit(1)->find();
        return $result['send_time'];
    }
    
    /**
     * 获取对某手机号最近一次发送短信的内容
     * @param string $cell_phone 手机号码
     * @return string 短信内容
     */
    public function getSmsLastInfo($cell_phone){
        $where['method'] = array('EQ','sms');
        $where['target'] = array('EQ',$cell_phone);
        $result = $this->where($where)->order('send_time desc')->limit(1)->find();
        $result['code'] = json_decode($result['content'],true)['code'];
        return $result;
    }
    
}