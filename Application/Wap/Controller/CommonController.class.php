<?php
namespace Wap\Controller;
use Think\Controller;

class CommonController extends Controller{
    /**
     * 初始化
     */
    public function _initialize(){
        if(!is_mobile()) redirect(U('/Shop/Index/index'));
    }
    
}
