<?php
/**
 * 商品模型
 * @author 陈培捷
 * @lastModifyTime 2016/02/25 17:41
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
    
    /**
     * 根据商品id获取商品信息（单个商品）
     * @param int $goods_id 商品分类id
     * @param string $field 要获取的字段列表（默认是‘*’，即全部字段）
     * @return array 读到的单个商品的信息数组
     */
    public function getGoodsInfo($goods_id,$field = '*'){
        $where['goods_id'] = array('eq',$goods_id);
        $result = $this->table(C('DB_PREFIX').'goods')->where($where)->field($field)->select();
        return $result[0];
    }
    
    /**
     * 获取商品列表
     * @param mixed $where 条件
     * @param string $field 字段
     * @param int $total 总记录数
     * @return array
     */
    public function getGoodsList($where = '',$field = '*',$total = 250){
        $result = $this->table(C('DB_PREFIX').'goods')->where($where)->field($field)->limit($total)->select();
        return $result;
    }
    
    public function getSpecificGoodsList($table = '',$where = '',$field = '*',$join = '',$order = '',$pages = '1'){
        $count = $this->table($table)->join($join)->where($where)->count();
        $Page = new \Think\Page($count,$pages);
        $show = $Page->show();
        $result = $this-> table($table)->join($join)->where($where)->limit($Page->firstRow.','.$Page->listRows)->field($field)->order($order)->select();
        return array('data'=>$result,'show'=>$show);
    }
    
}