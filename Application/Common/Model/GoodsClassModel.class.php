<?php

/**
 * 商品分类模型
 * @author 陈培捷
 * @lastModifyTime 2016/02/14 10:11
 */

namespace Common\Model;
use Think\Model;

class GoodsClassModel extends Model{
    
    protected $autoCheckFields = false; // 设置不自动检测表信息
    
    /**
     * （共三级）获取所有商品分类
     * @return array 分类数组
     */
    public function getAllGoodsClass(){
        $classTmp = array();
        $class2Tmp = array();
        $class = $this->table('ec_goods_class')->where('gc_parent_id=0')->select();
        foreach($class as $key => $value){
            $where['gc_parent_id'] = array('EQ',$value['gc_id']);
            $value['class2'] = $this->table('ec_goods_class')->where($where)->select();
            foreach($value['class2'] as $ke => $val){
                $where['gc_parent_id'] = array('EQ',$val['gc_id']);
                $val['class3'] = $this->table('ec_goods_class')->where($where)->select();
                $class2Tmp[] = $val;
            }
            $value['class2'] = $class2Tmp;
            $classTmp[] = $value;
        }
        return $classTmp;
    }
    
    /**
     * 获取下一级分类
     * @param string $gc_id 分类id
     * @param string $field 字段
     * @return array
     */
    public function getNextGoodsClass($gc_id,$field='*'){
        return $this->table(C('DB_PREFIX').'goods_class')->where('gc_parent_id<>0 AND gc_parent_id='.$gc_id)->field($field)->select();
    }
    
    /**
     * 获取指定分类下的所有三级分类
     * @param string $gc_id
     * @param string $field
     * @return array 一维数组
     */
    public function getNextAllGoodsClass($gc_id,$field='*'){
        $arrTmp =  $this->getNextGoodsClass($gc_id,$field);
        foreach($arrTmp as $key=>$value){
            $arrTmp2 = $this->getNextGoodsClass($value['gc_id'],$field);
            foreach($arrTmp2 as $ke=>$val){
                $result[] = $val;
            }
        }
        return !empty($result)?$result:$arrTmp;
    }
    
    
}


