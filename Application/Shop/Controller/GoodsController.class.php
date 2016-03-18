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
        
        $memberInfo = I('session.member_info');
        if(!empty($memberInfo)){
            $Favorite = D('Favorite');
            $result = $Favorite->judgeFavoriteExist($memberInfo['data']['member_id'],$goodsId);
            if(!$result['status']){
                $this->assign('is_favorite','false');
            }else{
                $this->assign('is_favorite','true');
            }
        }else{
            $this->assign('is_favorite','false');
        }
        
        $Discount = D('Discount'); // 封装限时折扣信息
        $goodsInfo = $Discount->packSingleGoodsDiscountInfo($goodsInfo);
        $goodsInfo['goods_pic'] = analysis_goods_pic($goodsInfo['goods_pic']);
        $GoodsClass = D('GoodsClass'); 
        $classInfo = $GoodsClass->getSpecificGoodsClassStructure($goodsId);// 封装分类级别信息
        $breadCrumbInfo = array('bread_type'=>'goods','class_info'=>$classInfo);
        $pageInfo['title'] = $goodsInfo["goods_name"];
        
        $this->assign($pageInfo);
        $this->assign("goods_info",$goodsInfo);
        $this->assign("bread_crumb",$breadCrumbInfo);
        layout("Layout/layout_common");
        $this->display('index');
    }
    
    /**
     * ajax的收藏操作行为，包括增加和删除（get传值）
     */
    public function ajaxFavoriteAction(){
        
        $memberInfo = I('session.member_info');
        if(empty($memberInfo)){
            $this->ajaxReturn(array('status'=>'false','info'=>'请先登录'));
        }else{
            $action = I('get.action');
            $goodsId = I('get.goods_id');
            $Goods = D('Goods');
            $field = 'goods_id';
            $result = $Goods->getGoodsInfo($goodsId,$field);
            if(!$result){
                $this->ajaxReturn(array('status'=>'false','info'=>'木有该商品'));
            }else{
                $memberId = $memberInfo['data']['member_id'];
                $Favorite = D('Favorite');
                if($action == 'add'){
                    $result = $Favorite->addFavorite($memberId,$goodsId);
                    if($result['status']){
                        $this->ajaxReturn(array('status'=>'false','info'=>$result['info']));
                    }else{
                        $this->ajaxReturn(array('status'=>'true','info'=>$result['info'],'data'=>$result['data']));
                    }
                }else if($action == 'delete'){
                    $result = $Favorite->delFavorite($memberId,$goodsId);
                    if($result['status']){
                        $this->ajaxReturn(array('status'=>'false','info'=>'删除失败'));
                    }else{
                        $this->ajaxReturn(array('status'=>'true','info'=>'删除成功'));
                    }
                }
            }
            
        }
        
    }
    
    public function _empty(){
        redirect(U("Shop/Search/index"));
    }
    
    public function demo(){
        $D = D('GoodsClass');
        $result = $D->getBreadCrumb('2');
        var_dump($result);exit;
    }
    
    public function demo2(){
        var_dump(I('session.'));exit;
    }
}


