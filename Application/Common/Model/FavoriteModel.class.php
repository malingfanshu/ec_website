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
    
    public function addFavorite($member_id,$goods_id){
        $where['goods_id'] = $goods_id;
        $where['member_id'] = $member_id;
        $result = $this->table(C('DB_PREFIX').'favorite')->where($where)->select();
        if($result){
            return array('status'=>false,'info'=>'已收藏','data'=>$result);
        }else{
            $data = array(
                'goods_id' => $goods_id,
                'member_id' => $member_id,
            );
            $result = $this->table(C('DB_PREFIX').'favorite')->data($data)->add();
            if($result){
                return array('status'=>true,'info'=>'收藏成功');
            }else{
                return array('status'=>false,'info'=>'收藏失败');
            }
        }
        
    }
    
    public function delFavorite($member_id,$goods_id){
        $where['goods_id'] = $goods_id;
        $where['member_id'] = $member_id;
        $result = $this->table(C('DB_PREFIX').'favorite')->where($where)->delete();
        if($result){
            return array('status'=>true,'info'=>'删除成功');
        }else{
            return array('status'=>false,'info'=>'删除失败');
        }
    }
    
    public function judgeFavoriteExist($member_id,$goods_id){
        $where['goods_id'] = $goods_id;
        $where['member_id'] = $member_id;
        $result = $this->table(C('DB_PREFIX').'favorite')->where($where)->select();
        if($result){
            return array('status'=>true,'info'=>'已收藏');
        }else{
            return array('status'=>false,'info'=>'未收藏');
        }
    }
    
}
