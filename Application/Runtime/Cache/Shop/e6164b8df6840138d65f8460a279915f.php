<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($title); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="XX,XX商城">
        <meta name="description" content="XX商城首页">
        <link rel="shortcut icon" href="/favicon.ico"/>
        
        
        <link rel="stylesheet" href="/Public/Shop/css/common.css"/>
        <script src="/Public/js/jquery-1.11.3.min.js"></script>
        
        <!--弹窗插件-->
        <link rel="stylesheet" href="/Public/Plugin/layer/skin/layer.css"/>
        <script src="/Public/Plugin/layer/layer.js"></script>
        <!--前端验证插件-->
        <link rel="stylesheet" href="/Public/Plugin/jquery-validation-engine/css/validationEngine.jquery.css"/>
        <script src="/Public/Plugin/jquery-validation-engine/js/jquery.validationEngine-zh_CN.js"></script>
        <script src="/Public/Plugin/jquery-validation-engine/js/jquery.validationEngine.min.js"></script>
        <!--日历插件-->
        <link rel="stylesheet" href="/Public/Plugin/jquery.cxcalendar-1.5/css/jquery.cxcalendar.css"/>
        <script src="/Public/Plugin/jquery.cxcalendar-1.5/js/jquery.cxcalendar.min.js"></script>
        <script src="/Public/Js/common.js"></script>
        <!--Superslide v2.1-->
        <script src="/Public/Plugin/superslide-2.1/jquery.SuperSlide.2.1.js"></script>
    </head>
    <body>
        <div class="right-control">
    
    <div class="btn login" title="个人资料">
        <div class="img">
            <img src="/Public/Image/icon/iconfont-denglu.png">
        </div>
    </div>
    <div class="btn shopping-cart" title="购物车">
        <div class="img">
            <img src="/Public/Image/icon/iconfont-gouwuche.png">
        </div>
    </div>
    <div class="btn favorite" title="收藏夹">
        <div class="img">
            <img src="/Public/Image/icon/iconfont-shoucang.png">
        </div>
    </div>
    <div class="btn return-top" title="返回顶部">
        <div class="img">
            <img src="/Public/Image/icon/iconfont-fanhuidingbu.png">
        </div>
    </div>
    
</div>
<script>
    // 返回顶部
    $(".right-control .return-top").on("click",function(e){
        $('body').animate({
            scrollTop:'0px',
        },'fast');
    });
</script>
        <div class="body">
            <header>
    
    <!--顶栏-->
    <div class="top-bar H35">
        <div class="center-block">
            <div class="mall-name">
                <span><?php echo ($mall_name); ?></span>
            </div>
            <div class="control"></div>
        </div>
    </div>
    
    <!--头部栏-->
    <div class="header-bar main-block H80">
        <div class="center-block">
            <div class="site-logo">
                <img src="/Public/Image/logo.png">
            </div>
            <div class="header-nav">
                <ul>
                    <li class="horizontal-block clear-right-padding"></li>
                    <li class="classify-item"><a href="javascript:void(0);">产品列表1</a></li>
                    <li class="classify-item"><a href="javascript:void(0);">产品列表2</a></li>
                    <li class="classify-item"><a href="javascript:void(0);">产品列表3</a></li>
                    <li class="classify-item"><a href="javascript:void(0);">产品列表4</a></li>
                    <li class="classify-item"><a href="javascript:void(0);">产品列表4</a></li>
                </ul>
            </div>
            <div class="search">
                <div class="search-input"><input type="text" placeholder="请输入要搜索的商品（关键词用空格分隔）" value="<?php echo I('get.keywords');?>" /></div><div class="search-btn"><p>搜索</p></div>
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>
    
    <!--下拉产品列表-->
    <div class="pull-down H100 hidden">
    </div>
    
    <!--其他分类-->
    <div class="main-block classify-bar">
        <div class="center-block">
            <div class="other-nav">
                <div class="all-classify">
                    <span>全部分类</span><img src="/Public/Image/icon/iconfont-xiala.png" />
                </div>

                    <div class="classify-block hidden">
                        <ul class="left clear-padding clear-margin">
                            <div class="H15"></div>
                            <?php if(is_array($all_goods_class)): $i = 0; $__LIST__ = $all_goods_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Shop/Search/index/gc_id/'.$vo[gc_id]);?>"><li data-gcid="<?php echo ($vo[gc_id]); ?>"><?php echo ($vo[gc_name]); ?></li></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="H15"></div>
                        </ul>
                        <ul class="right clear-padding clear-margin">
                        <?php if(is_array($all_goods_class)): $i = 0; $__LIST__ = $all_goods_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div data-gcid="<?php echo ($vo[gc_id]); ?>" class="right-body none">
                        <?php if(is_array($vo[class2])): $i = 0; $__LIST__ = $vo[class2];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="second-item">
                                <div class="classify-second-name"><a href="<?php echo U('Shop/Search/index/gc_id/'.$v[gc_id]);?>"><span><?php echo ($v[gc_name]); ?>></span></a></div>

                                    <div class="third">
                                    <?php if(is_array($v[class3])): $i = 0; $__LIST__ = $v[class3];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?><div class="third-item"><a href="<?php echo U('Shop/Search/index/gc_id/'.$s[gc_id]);?>"><span><?php echo ($s[gc_name]); ?></span></a></div><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <div style="clear:both;"></div>
                                    </div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>

                <div style="clear:both;"></div>
            </div>
        </div>
    </div>
    <div class="main-block full-screen-line">   
    </div>
</header>

<script>
    // 搜索功能
    $("div.header-bar div.search-btn").on("click",function(e){
        var keywords = $("div.header-bar div.search-input input").val();
        var url = "<?php echo U('Shop/Search/index/keywords');?>"+'/'+keywords;
        var index = layer.load(1); //换了种风格
        window.location.href = url;
    });
    
    $(".header-bar .header-nav ul li, .pull-down").mouseover(function(e){
        if($(".pull-down").hasClass("hidden")){
            $(".pull-down").removeClass("hidden");
        }
    });
    $(".header-bar .header-nav ul li.classify-item, .pull-down").mouseout(function(e){
        if(!$(".pull-down").hasClass("hidden")){
             $(".pull-down").addClass("hidden");
        }
    });
    $(".other-nav .all-classify").mouseover(function(e){
        if($(".other-nav .classify-block").hasClass("hidden")){
            $(".other-nav .classify-block").removeClass("hidden");
            
        }
    });
    $(".other-nav .classify-block").mouseleave(function(event){
        if(!$(".other-nav .classify-block").hasClass("hidden")){
            $(".other-nav .classify-block").addClass("hidden");
        }
    });
    
    // 商品分类部分
    function changeRightBody(gcid){
        var parent = $(".other-nav .classify-block .right");
        parent.children("div.right-body").each(function(index,ele){
            $(ele).addClass("none");
        });
        if(gcid != null && gcid != ''){
            parent.children("div.right-body").each(function(index,ele){
                if($(ele).data("gcid") == gcid){
                    $(ele).removeClass("none");
                }
            });
        }else{
            parent.children("div.right-body:first").removeClass("none");
        }
    }
    changeRightBody();
    
    $(".classify-block ul.left li").on("mouseover",function(e){
//        $(this).data('gcid');
        changeRightBody($(this).data('gcid'));
    });

</script>
                <div class="center-block">
    <div class='nav-breadcrumb'>
        <?php switch($bread_crumb[bread_type]): case "goods": ?><a href="<?php echo U('Shop/Search/index');?>">全部商品</a><span>></span><a href="<?php echo U('Shop/Search/index/gc_id/'.$bread_crumb['class_info']['gc_1']['gc_id']);?>"><?php echo ($bread_crumb['class_info']['gc_1']['gc_name']); ?></a><span>></span><a href="<?php echo U('Shop/Search/index/gc_id/'.$bread_crumb['class_info']['gc_2']['gc_id']);?>"><?php echo ($bread_crumb['class_info']['gc_2']['gc_name']); ?></a><span>></span><a href="<?php echo U('Shop/Search/index/gc_id/'.$bread_crumb['class_info']['gc_3']['gc_id']);?>"><?php echo ($bread_crumb['class_info']['gc_3']['gc_name']); ?></a><span>></span><span><?php echo ($bread_crumb['class_info']['goods']['goods_name']); ?></span><?php break;?>
            <?php case "classify": ?><a href="<?php echo U('Shop/Search/index');?>">全部商品</a><span>></span><a href="<?php echo U('Shop/Search/index/gc_id/'.$bread_crumb['class_info']['gc_1']['gc_id']);?>"><?php echo ($bread_crumb['class_info']['gc_1']['gc_name']); ?></a>
                <?php if(!empty($bread_crumb[class_info][gc_2])): ?><span>></span><a href="<?php echo U('Shop/Search/index/gc_id/'.$bread_crumb['class_info']['gc_2']['gc_id']);?>"><?php echo ($bread_crumb['class_info']['gc_2']['gc_name']); ?></a><?php endif; ?>
                <?php if(!empty($bread_crumb[class_info][gc_3])): ?><span>></span><a href="<?php echo U('Shop/Search/index/gc_id/'.$bread_crumb['class_info']['gc_3']['gc_id']);?>"><?php echo ($bread_crumb['class_info']['gc_3']['gc_name']); ?></a><?php endif; break;?>
            <?php case "search": ?><a href="<?php echo U('Shop/Search/index');?>">全部商品</a><span>></span><span>搜索结果：<font style='color:red;'><?php echo ($bread_crumb['class_info']['gc_1']); ?></font></span><?php break; endswitch;?>
    </div>
</div>
<script>
    console.log(<?php echo json_encode($bread_crumb);?>);
</script>
<?php if($goods_info[data] != ''): ?><div class="center-block">
    <div class='goods-scope'>
    </div>
</div>
    <div class="center-block">
        <div class='search-info'>

            <div class='recom-list'>
                <div class="title">推荐商品位置</div>
                <div class="item">
                    <div class="image">
                        <img src="/Public/Image/test/hongmi2_hong_1.png">
                    </div>
                    <div class="goods-name">
                        <span>某某商品某某商品某某商品某某商品某某商品</span>
                    </div>
                    <div class="goods-price">
                        <span>￥200</span>
                    </div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="/Public/Image/test/hongmi2_hong_1.png">
                    </div>
                    <div class="goods-name">
                        <span>某某商品某某商品某某商品某某商品某某商品</span>
                    </div>
                    <div class="goods-price">
                        <span>￥200</span>
                    </div>
                </div>
            </div>
            
            <div class='goods-list'>
                <div class="sort">
                    <a href="javascript:void(0);">
                    <?php if($sort_info[sort] == ''): ?><div class="items on">
                    <?php else: ?>
                        <div data-type="zonghe" class="items"><?php endif; ?>
                            <span>综合<span>
                        </div>
                    </a>
                    <a href="javascript:void(0);">
                        
                    <?php if($sort_info[sort] == '1'): ?><div data-type="xiaoliang" class="items on">   
                            <span>销量<span>
                        <?php switch($sort_info[order]): case "1": ?><span data-order="1">▲</span><?php break;?>
                            <?php case "2": ?><span data-order="2">▼</span><?php break;?>
                            <?php default: ?>
                            <?php case "2": ?><span data-order="2">▼</span><?php break; endswitch;?>
                    <?php else: ?>
                        <div data-type="xiaoliang" class="items">
                            <span>销量<span><?php endif; ?>
                        </div>
                    </a>
                    <a href="javascript:void(0);">
                    <?php if($sort_info[sort] == '2'): ?><div data-type="jiage" class="items on">   
                            <span>价格<span>
                        <?php switch($sort_info[order]): case "1": ?><span data-order="1">▲</span><?php break;?>
                            <?php case "2": ?><span data-order="2">▼</span><?php break;?>
                            <?php default: ?>
                            <?php case "1": ?><span data-order="1">▲</span><?php break; endswitch;?>
                    <?php else: ?>
                        <div data-type="jiage" class="items">
                            <span>价格<span><?php endif; ?>
                        </div>
                    </a>
                    <a href="javascript:void(0);">
                    <?php if($sort_info[sort] == '3'): ?><div data-type="pingjia" class="items on">   
                            <span>评价<span>
                        <?php switch($sort_info[order]): case "1": ?><span data-order="1">▲</span><?php break;?>
                            <?php case "2": ?><span data-order="2">▼</span><?php break;?>
                            <?php default: ?>
                            <?php case "2": ?><span data-order="2">▼</span><?php break; endswitch;?>
                    <?php else: ?>
                        <div data-type="pingjia" class="items">
                            <span>评价<span><?php endif; ?>
                        </div>
                    </a>
                    <div style="clear:both;"></div>
                </div>
                <div class="list">
                <?php if(is_array($goods_info[data])): $i = 0; $__LIST__ = $goods_info[data];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class='item'>
                        <div class='image'>
                            <a href="<?php echo U('Shop/Goods/index/goods_id/'.$vo[goods_id]);?>"><img src='<?php echo ($vo[goods_pic][main_pic]); ?>'/></a>
                        </div>
                        <div class='price'><span>￥<?php echo ($vo[goods_price]); ?></span></div>
                        <div class='goods-name'><a href="<?php echo U('Shop/Goods/index/goods_id/'.$vo[goods_id]);?>"><span><?php echo ($vo[goods_name]); ?></span></a></div>
                        <div class='other-info'>
                            <div class='evaluation-info'>已有<span>1000</span>人评价</div>
                            <div class='sold-info'>售出<span>1000</span>件</div>
                        </div>
                        <div class='add-cart'><span>加入购物车</span></div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <div style='clear:both;'></div>
                </div>
            </div>
            <div style='clear:both;'></div>
        </div>
    </div>
<?php else: ?>
    <div class="center-block">
    没有找到商品
</div><?php endif; ?>
<script>
    // 获取排序的order值
    function getOrder(type){
        var value = '';
        var order = "<?php echo I('get.order');?>";
        if(order == '' || order == null){ // order默认值
            switch(type){
                case 'xiaoliang':
                    value = 2;
                    break;
                case 'jiage':
                    value = 1;
                    break;
                case 'pingjia':
                    value = 2;
                    break;
                default:
                    value = 1;
                    break;
            }
            return value;
        }else{ // 这里变order的值
            if(order == 1){
                value = 2;
            }else if(order == 2){
                value = 1;
            }
            return value;
        }
    }
    
    // 其他get值
    function otherGet(){
        var keywords = "<?php echo I('get.keywords');?>";
        var gc_id = "<?php echo I('get.gc_id');?>";
        // 功能上设计不会同时有keywords和gc_id存在的情况
        if(keywords != '' && keywords != null){
            return "/keywords/"+keywords;
        }
        if(gc_id != '' && gc_id != null){
            return "/gc_id/"+gc_id;
        }
        if(keywords == '' && gc_id == ''){
            return '';
        }
    }
    
    // 切换排序
    $("div.search-info div.goods-list div.sort div.items").on("click",function(e){
        var type = $(this).data("type");
        var url = '';
        switch(type){
            case 'zonghe':
                url = "<?php echo U('Shop/Search/index');?>"+otherGet();
                break;
            case 'xiaoliang':
                url = "<?php echo U('Shop/Search/index');?>"+otherGet()+"/sort/1/order/"+getOrder(type);
                break;
            case 'jiage':
                url = "<?php echo U('Shop/Search/index');?>"+otherGet()+"/sort/2/order/"+getOrder(type);
                break;
            case 'pingjia':
                url = "<?php echo U('Shop/Search/index');?>"+otherGet()+"/sort/3/order/"+getOrder(type);
                break;
        }
        var index = layer.load(1);
        window.location.href = url;
    });
    
</script>
  
            <div class="bottom-bar"></div>
        </div>
    </body>
</html>