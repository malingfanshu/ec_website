<?php

/**
 * 商品折扣模型
 * @author 陈培捷
 * @lastModifyTime 2016/02/14 13:28
 */

namespace Common\Model;
use Think\Model;

class DiscountModel extends Model{
    
    protected $autoCheckFields = false; // 设置不自动检测表信息
    
    /**
     * 对查询出来的商品数组进行再封装（加上限时折扣的价格）
     * @param array $arrGoods 二维的商品数组
     * @return array 封装后的商品数组
     */
    public function packGoodsDiscountInfo($arrGoods){
        $DiscountList = $this->getEffectiveGoodsDiscountList();
        $arrTmp = array();
        foreach($arrGoods as $key=>$value){
            foreach($DiscountList as $ke=>$val){
                if($val['goods_id'] == $value['goods_id']){
                    $value['discount_price'] = $value['goods_price'] * (double)$val['discount']/10;
                }
            }
            $arrTmp[] = $value;
        }
        return $arrTmp;
    }
    
    /**
     * 获取所有的有效的折扣活动信息
     * @return array
     */
    public function getEffectiveDiscountInfo(){
        $nowTime = (int)time();
        $condition['start_time'] = array('lt',$nowTime);
        $condition['end_time'] = array('gt',$nowTime);
        $condition['status'] = array('eq','1');
        return $this->table(C('DB_PREFIX').'discount')->where($condition)->select();
    }
    
    /**
     * 获取一个商品对应折扣的列表
     * @return array
     */
    private function getEffectiveGoodsDiscountList(){
        $arrTmp = $this->getEffectiveDiscountInfo();
        foreach($arrTmp as $key=>$value){
            $arrTmp2 = explode(',',$value['goods_id']);
            foreach($arrTmp2 as $ke=>$val){
                $result[] = array('goods_id'=>$val,'discount'=>(double)$value['discount']);
            }   
        }
        return $result;
    }
    
}
