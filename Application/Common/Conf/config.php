<?php
return array(
    //'配置项'=>'配置值'
    
    /**
     * API程序调用的控制密钥
     */
    'APP_KEY' => 'key',
    'APP_SECRET' => 'secret',
    
    /**
     * 淘宝开放平台API参数配置
     */
    'TAOBAO_KEY'=>'23302291',
    'TAOBAO_SECRET'=>'dd85fe67813e5fdaede732d982614bf7',
    
    /**
     * 网易邮箱smtp发送邮件参数配置
     */
    'NETEASE_SMTP_HOST' => 'smtp.163.com', // 网易的smtp服务器地址
    'NETEASE_USERNAME' => 'cpjmall@163.com', // 邮箱用户名
    'NETEASE_PASSWORD' => 'a12345678', // 客户端邮箱密码，和登录主密码不一样
    'NETEASE_SMTP_SECURE' => 'tls', // 协议
    'NETEASE_PORT' => '25', // 163邮箱非ssl协议端口为25
    'NETEASE_FROM' => 'cpjmall@163.com', // 从哪个邮箱发送，和邮箱用户名一致
    'NETEASE_CHARSET' => 'UTF-8', // 发送内容的编码
    'NETEASE_NICKNAME' => '陈培捷的商城', // 发送人昵称
    
    'MEMBER_ACTIVE_VALID_TIME' => '30', // 激活用户有效时间
    
    /*默认的一些配置*/
    'DEFAULT_GOODS_PIC' => '/Public/Image/test/not_pic.png', // 商品无图调用的默认图片
    
);