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
            $class2Tmp = array();
            $classTmp[] = $value;
        }
        return $classTmp;
    }
    
    /**
     * 获取指定分类的各种信息
     * @param int/string $gc_id 分类id
     * @param string $field 字段
     * @return array
     */
    public function getClass($gc_id,$field='*'){
        $result = $this->table(C('DB_PREFIX').'goods_class')->where('gc_id='.$gc_id)->field($field)->select();
        return $result[0];
    }
    
    /**
     * 获取指定分类的下一级分类信息
     * @param int/string $gc_id 分类id
     * @param string $field 字段
     * @return array
     */
    public function getNextClass($gc_id,$field='*'){
        return $this->table(C('DB_PREFIX').'goods_class')->where('gc_parent_id<>0 AND gc_parent_id='.$gc_id)->field($field)->select();
    }
    
    /**
     * 获取指定分类的上一级分类信息
     * @param int/string $gc_id 分类id
     * @param string $field 字段
     * @return array
     */
    public function getPrevClass($gc_id,$field='*'){
        $result = $this->getClass($gc_id,'gc_parent_id');
        $result = $this->table(C('DB_PREFIX').'goods_class')->where('gc_id='.$result['gc_parent_id'])->field()->select();
        return $result[0];
    }
    
    /**
     * 获取指定分类下的所有三级分类
     * @param string $gc_id
     * @param string $field
     * @return array 一维数组
     */
    public function getThirdGoodsClass($gc_id,$field='*'){
        $arrTmp = $this->getNextClass($gc_id,$field);
        foreach($arrTmp as $key=>$value){
            $arrTmp2 = $this->getNextClass($value['gc_id'],$field);
            foreach($arrTmp2 as $ke=>$val){
                $result[] = $val;
            }
        }
        $value = !empty($result)?$result:$arrTmp;
        return !empty($value)?$value:array($this->getClass($gc_id));
    }
    
    
    /**
     * 根据商品id获取全部三级分类菜单
     * @param int/string $goods_id 商品id
     * @return array
     */
    public function getSpecificGoodsClassStructure($goods_id){
        $Goods = D('Goods');
        $field = 'gc_id';
        $result = $Goods->getGoodsInfo($goods_id,$field);
        $arrClassInfo = array();
        $arrClassInfo['gc_3'] = $this->getClass($result['gc_id']); 
        $arrClassInfo['gc_2'] = $this->getPrevClass($result['gc_id']);
        $arrClassInfo['gc_1'] = $this->getPrevClass($arrClassInfo['gc_2']['gc_id']);
        return $arrClassInfo;
    }
    
    
}


