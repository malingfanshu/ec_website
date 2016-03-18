<?php
/**
 * Shop模块的搜索控制器，包括排序等
 * @author 陈培捷
 * @lastModifyTime 2016/02/29 10:37
 */
namespace Shop\Controller;
use Think\Controller;

class SearchController extends CommonController{
    
    public function index(){
        $pageInfo['title'] = C("MALL_NAME").'-全部商品';
        $Goods = D('Goods');
        $table = C('DB_PREFIX').'goods'; // 表
        $where = ''; // 查询条件
        $field = ''; // 查询字段
        $join = ''; // 多表链接条件
        $order = ''; // 排序命令
        $pages = '4'; // 每页记录数
        
        if(!empty(I("get.keywords"))){ // 关键词的
            $keywords = '%'.preg_replace('/ /',"%",I("get.keywords")).'%';
            $where['goods_name'] = array('like',$keywords);
            $classInfo['gc_1'] = I("get.keywords");
            $breadCrumbInfo = array('bread_type'=>'search','class_info'=>$classInfo);
            $this->assign("bread_crumb",$breadCrumbInfo);
        }
        
        if(!empty(I("get.gc_id"))){ // 分类的
            $gcId = I("get.gc_id");
            $GoodsClass = D('GoodsClass');
            $arr = $GoodsClass->getThirdGoodsClass($gcId);
            $arrTmp = array();
            foreach($arr as $key=>$value){
                $arrTmp[] = $value['gc_id'];
            }
            $gcIdStr = implode(",",$arrTmp);
            $where['gc_id'] = array('in',$gcIdStr);
            $classInfo = $GoodsClass->getBreadCrumb($gcId);
            $breadCrumbInfo = array('bread_type'=>'classify','class_info'=>$classInfo);
            $this->assign("bread_crumb",$breadCrumbInfo);
        }

        if(!empty(I('get.sort'))){
            $this->assign('sort_info',array('sort'=>I('get.sort'),'order'=>I('get.order')));
            $sort = I('get.sort'); // 1是销量，2是价格，3是评价
            $order = I('get.order'); // 1是升序，2是降序
            if($sort == 1){ // 销量
                $field = C('DB_PREFIX').'goods.*,sold_list.sum as goods_sum';
                $join = 'left join sold_list on '.C('DB_PREFIX').'goods.goods_id = sold_list.goods_id';
                switch($order){
                    case '1':
                        $order = 'sold_list.sum asc';
                        break;
                    case '2':
                        $order = 'sold_list.sum desc';
                        break;
                    default:
                        $order = 'sold_list.sum desc'; // 销量默认降序
                        break;
                }
            }else if($sort == 2){ // 价格
                $field = C('DB_PREFIX').'goods.*';
                switch($order){
                    case '1':
                        $order = 'goods_price asc';
                        break;
                    case '2':
                        $order = 'goods_price desc';
                        break;
                    default:
                        $order = 'goods_price asc'; // 价格默认升序
                        break;
                }
            }else if($sort == 3){ // 评价
                $field = C('DB_PREFIX').'goods.*,evaluation_list.avg as evaluation_avg';
                $join = 'left join evaluation_list on '.C('DB_PREFIX').'goods.goods_id = evaluation_list.goods_id';
                switch($order){
                    case '1':
                        $order = 'evaluation_list.avg asc';
                        break;
                    case '2':
                        $order = 'evaluation_list.avg desc';
                        break;
                    default:
                        $order = 'evaluation_list.avg desc'; // 评价默认降序
                        break;
                }
            }
        }
        
        $result = $Goods->getSpecificGoodsList($table,$where,$field,$join,$order,$pages);
        
        
        $arrTmp = array();
        foreach($result['data'] as $key=>$value){
            $value['goods_pic'] = analysis_goods_pic($value['goods_pic']); // 商品图片处理
            $arrTmp[] = $value;
        }
        $result['data'] = $arrTmp;
        
        $this->assign('goods_info',$result);
        $this->assign("test_data",json_encode($result));
        $this->assign($pageInfo);
        layout("Layout/layout_common");
        $this->display('index');
    }
    
    public function _empty(){
        $this->index();
    }
    
    public function demo(){
        $Goods = D('Goods');
        $str = '红米 高配';
        $str = '%'.preg_replace('/ /',"%",$str).'%';
//        var_dump($str);exit;
//        $keywords = '红米';
        $where['goods_name'] = array('like',$str);
        $result = $Goods->getSpecificGoodsList($table,$where,$field,$join,$order,$pages);
        var_dump($result);exit;
    }
    
    public function demo2(){
        $Goods = D('Goods');
        $table = C('DB_PREFIX').'goods';
        $where = '';
        $field = C('DB_PREFIX').'goods.*,evaluation_list.avg';
        $join = 'left join evaluation_list on '.C('DB_PREFIX').'goods.goods_id = evaluation_list.goods_id';
        $order = 'evaluation_list.avg desc';
        $pages = '4';
        $result = $Goods->getSpecificGoodsList($table,$where,$field,$join,$order,$pages);
        var_dump($result);exit;
    }
    
    public function demo3(){
        $GoodsClass = D('GoodsClass');
        $result = $GoodsClass->getThirdGoodsClass('1');
        var_dump($result);exit;
    }
    
}

