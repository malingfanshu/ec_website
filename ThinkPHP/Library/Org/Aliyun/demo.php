<?php
	include "TopSdk.php";
	date_default_timezone_set('Asia/Shanghai'); 

	$appkey = '23302291';
	$secret = 'dd85fe67813e5fdaede732d982614bf7';
	$c = new TopClient;
	$c->appkey = $appkey;
	$c->secretKey = $secret;
	$req = new AlibabaAliqinFcSmsNumSendRequest;
	$req->setExtend("123456");
	$req->setSmsType("normal");
	$req->setSmsFreeSignName("登录验证");
	$req->setSmsParam('{"code":"123456","product":"alidayu"}');
	$req->setRecNum("15577375746");
	$req->setSmsTemplateCode("SMS_4756068");
	$resp = $c->execute($req);
	var_dump($resp);

?>