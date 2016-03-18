<?php
/**
 * 收藏模型
 * @author 陈培捷
 * @lastModifyTime 2016/03/18 09:10
 */

namespace Common\Model;
use Think\Model;

class FavoriteModel extends Model{
    protected $autoCheckFields = false; // 设置不自动检测表信息
    
    public function addFavorite($goods_id,$member_id){
        $where['goods_id'] = $goods_id;
        $where['member_id'] = $member_id;
        $result = $this->table(C('DB_PREFIX').'favorite')->where($where)->select();
        if($result){
            return array('status'=>false,'info'=>'插入失败');
        }else{
            $data = array(
                'goods_id' => $goods_id,
                'member_id' => $member_id,
            );
            $result = $this->table(C('DB_PREFIX').'favorite')->data($data)->add();
            if($result){
                return array('status'=>true,'info'=>'插入成功');
            }else{
                return array('status'=>false,'info'=>'插入失败');
            }
        }
        
    }
    
    public function delFavorite($goods_id,$member_id){
        $where['goods_id'] = $goods_id;
        $where['member_id'] = $member_id;
        $result = $this->table(C('DB_PREFIX').'favorite')->where($where)->delete();
        if($result){
            return array('status'=>true,'info'=>'删除成功');
        }else{
            return array('status'=>false,'info'=>'删除失败');
        }
    }
    
}
