<?php
/**
 * Shop模块的产品控制器
 * @author 陈培捷
 * @lastModifyTime 2016/02/26 10:28
 */

namespace Shop\Controller;
use Think\Controller;

class GoodsController extends CommonController{
    
    public function index(){
        
        if(empty(I('get.goods_id'))){
            $this->error('没有找到该商品');
        }
        $goodsId = (int)I('get.goods_id');
        $Goods = D('Goods');
        $goodsInfo = $Goods->getGoodsInfo($goodsId);
        if(empty($goodsInfo)){
            $this->error('没有找到该商品');
        }
        
        $Discount = D('Discount'); // 封装限时折扣信息
        $goodsInfo = $Discount->packSingleGoodsDiscountInfo($goodsInfo);
        $goodsInfo['goods_pic'] = analysis_goods_pic($goodsInfo['goods_pic']);
        $GoodsClass = D('GoodsClass'); // 封装分类级别信息
        $classInfo = $GoodsClass->getSpecificGoodsClassStructure($goodsId);
        $pageInfo['title'] = $goodsInfo["goods_name"];
        
        $this->assign($pageInfo);
        $this->assign("goods_info",$goodsInfo);
        $this->assign("class_info",$classInfo);
        layout("Layout/layout_common");
        $this->display('index');
    }
    
    public function ajaxFavoriteAction($action,$goods_id){
        if($action == 'add'){
            
        }else if($action == 'delete'){
            
        }
    }
    
    public function _empty(){
        redirect(U("Shop/Search/index"));
    }
    
    public function demo(){
        var_dump(I('session.'));exit;
    }
}


