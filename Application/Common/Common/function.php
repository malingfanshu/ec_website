<?php

/**
 * 应用级函数文件
 * @author 陈培捷
 * @lastModifyTime 2016/01/27 14:39
 */

/**
 * 返回错误消息
 * @param int $errorCode 错误编码
 * @param string $errorInfo 错误信息
 * @return array json格式的错误信息数组
 */
function return_error_info($errorCode = "",$errorInfo = "未知错误"){
    return ['errorCode'=>$errorCode,'errorInfo'=>$errorInfo];
}

