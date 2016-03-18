<?php
/**
 * Shop模块的基类控制器
 * @author 陈培捷
 * @lastModifyTime 2016/01/27 16:32
 */

namespace Shop\Controller;
use Think\Controller;

class CommonController extends Controller{
    /**
     * 初始化
     */
    public function _initialize(){
        header("Content-Type:text/html;Charset=utf-8"); // 格式全部规定utf-8
        session(array('name'=>'session_id','expire'=>3600));
        $this->assign("mall_name",C("MALL_NAME"));
        if(is_mobile()) redirect(U('/Wap/Index/index'));
        
        /*商品总分类*/
        $GoodsClass = D("GoodsClass");
        $allGoodsClass = $GoodsClass->getAllGoodsClass();
        $this->assign("all_goods_class",$allGoodsClass);
        
        // 输出测试数据
        $this->assign('data',json_encode($allGoodsClass));
    }
    
    /**
     * 生成验证码图片
     */
    public function getVerify(){
//        header("Content-type: image/png");
        $Verify = new \Think\Verify;
        $codeInfo = $Verify->entry();
    }
    
}
