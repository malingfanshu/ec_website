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

/**
 * 根据数组分页函数
 * @param array $array 数组
 * @param int $rows 每页记录数
 * @return array array['list']是列表，array['show']是切换页面的Html代码
 */
function array_page($array,$rows){
    $count=count($array);
    $Page=new \Think\Page($count,$rows);
    $result['list']=array_slice($array,$Page->firstRow,$Page->listRows);
    $result['show'] = $Page->show();
    return $result;
}

/**
 * 商品图片路径
 * @param string $goods_pic_lists
 * @return array
 */
function analysis_goods_pic($goods_pic_lists){
    if(empty($goods_pic_lists)){
        return array('main_pic'=>C("DEFAULT_GOODS_PIC"),'pic_list'=>array(C("DEFAULT_GOODS_PIC")));
    }else{
        $array_tmp = array();
        $arr = explode(",",$goods_pic_lists);
        foreach($arr as $key=>$value){
//            $pattern = '/__ROOT__/';
//            $replacement = '.';
//            $pic_url = preg_replace($pattern,$replacement,$value);
            if(file_exists(".".$pic_url)){
                $array_tmp[] = $value;
            }
            if(empty($array_tmp)){
                return array('main_pic'=>C("DEFAULT_GOODS_PIC"),'pic_list'=>array(C("DEFAULT_GOODS_PIC")));
            }
        }
        return array('pic_list'=>$array_tmp,'main_pic'=>$array_tmp[0]);
    }
}

