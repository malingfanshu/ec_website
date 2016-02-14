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
//        $str = '1';
//        echo json_encode(explode(',',$str));exit;
        $D = D('Goods');
        $result = $D->getClassGoods('1');
        $D2= D('Discount');
        $result = $D2->packGoodsDiscountInfo($result);
        echo json_encode($result);exit;
    }
    
}