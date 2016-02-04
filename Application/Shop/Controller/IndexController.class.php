<?php

/**
 * 主控制器
 * @author 陈培捷
 * @lastModifyTime 2016/01/27 15:47
 */

namespace Shop\Controller;
use Think\Controller;

class IndexController extends CommonController {
    
    public function index(){
        redirect(U('Shop/Login/index'));
    }
    
    public function demo(){
        $GoodsClass = D('GoodsClass');
        $result = $GoodsClass->getAllGoodsClass();
        echo json_encode($result);exit;
    }
    
}