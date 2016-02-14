<?php

/**
 * 商品模型
 * @author 陈培捷
 * @lastModifyTime 2016/02/14 09:25
 */

namespace Common\Model;
use Think\Model;

class GoodsModel extends Model{
    protected $autoCheckFields = false; // 设置不自动检测表信息
    
    /**
     * 根据商品分类id获取商品列表
     * @param string $gc_id 商品分类id
     * @param string $where 条件
     * @param string $field 字段
     * @return array 一维数组
     */
    public function getClassGoods($gc_id,$where='',$field='*'){
        $GoodsClass = D('GoodsClass');
        $result = $GoodsClass->getNextAllGoodsClass($gc_id);
        foreach($result as $key=>$value){
            $arrTmp[] = $value['gc_id'];
        }
        $gcIdRange = implode(',', $arrTmp);
        $condition['gc_id'] = array('IN',$gcIdRange);
        return $this->table(C('DB_PREFIX').'goods')->where($condition)->select();
    }
    
}