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
                <style>
    .classify-bar{ display:none !important; }
</style>

<div class="main-block main-content">
    <div class="main-slide center-block">
        
        <!--左侧产品分类-->
        <div class="classify">
            <ul class="clear-margin clear-left-padding">
                <div class="H15"></div>
                <li><a>分类1</a></li>
                <li><a>分类2</a></li>
                <li><a>分类3</a></li>
                <div class='more-products'><a href='javascript:void(0);'>更多</a></div>
                <div class="H15"></div>
            </ul>
        </div>
        
        <!--触发显示的产品具体分类-->
        <div class="classify-second hidden">
            <ul class="clear-margin clear-left-padding">
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品1</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品2</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品3</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品4</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品5</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品6</span>
                    </a>
                </li>
            </ul>
            <ul class="clear-margin clear-left-padding">
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品1</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品2</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品3</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品4</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品5</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品6</span>
                    </a>
                </li>
            </ul>
        </div>
        
        <!--首页幻灯片-->
        <div class="slideBox">
            <div class="hd">
                <ul class="clear-padding clear-margin">
                    <li>
                        <div class="slide-circle"></div>
                    </li>
                    <li>
                        <div class="slide-circle"></div>
                    </li>
                </ul>
            </div>
            <div class="bd">
                <ul class="clear-padding clear-margin">
                    <li><a href="javascript:void(0);" target="_blank"><img src="/Public/Image/slide-1.jpg" /></a></li>
                    <li><a href="javascript:void(0);" target="_blank"><img src="/Public/Image/slide-2.jpg" /></a></li>
                </ul>
            </div>
            <div class="slide-control-button">
                <a class="prev" href="javascript:void(0)">
                    <div class="button-bg">
                        <img class="btn-img" src="/Public/Image/icon/iconfont-iconback.png" />
                    </div>
                </a>
                <a class="next" href="javascript:void(0)">
                    <div class="button-bg">
                         <img class="btn-img"  src="/Public/Image/icon/iconfont-iconmore.png" />
                    </div>
                </a>
            </div>
        </div>
        
    </div>
    <div class="show-product center-block">
        
        <!--明星单品部分-->
        <div class="star-single">
            <div class="title">
                <img src="/Public/Image/icon/iconfont-31shoucang.png"><span>明星单品</span>
            </div>
            <div class="txtScroll-left">
                <div class="hd">
                    <a class="prev">
                        <p><</p>
                    </a>
                    <a class="next">
                        <p>></p>
                    </a>
                </div>
                <div class="bd">
                    <ul class="infoList">
                        <li class="page">
                            <a href="javascript:void(0);" target="_blank">
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item clear-right-margin"></div>
                            </a>
                        </li>
                        <li class="page">
                            <a href="javascript:void(0);" target="_blank">
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item"></div>
                                <div class="item clear-right-margin"></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!--限时折扣部分-->
        <div class="on-sale center-block">
            <div class="title">
                <img src="/Public/Image/icon/iconfont-shijian.png"><span>限时折扣</span>
            </div>
            <div class="list clear-padding">
                <img class="left-image" src="/Public/Image/left-image.jpg" />
            </div>
            <div class="list">
                <div class="item"></div>
                <div class="item"></div>
            </div>
            <div class="list">
                <div class="item"></div>
                <div class="item"></div>
            </div>
            <div class="list">
                <div class="item"></div>
                <div class="item"></div>
            </div>
            <div class="list">
                <div class="item"></div>
                <div class="item"></div>
            </div>
            <div style='clear:both;'></div>
        </div>
        
        <!--推荐商品部分-->
        <div class="recom-list center-block">
            <div class="title">
                <img src="/Public/Image/icon/iconfont-guanzhu.png"><span>推荐商品</span>
            </div>
            <div class="list clear-padding">
                <img class="left-image" src="/Public/Image/left-image.jpg" />
            </div>
            <div class="list goods-list">
                <div class="txtScroll-left">
                    <div class="hd">
                        <a class="prev">
                            <p><</p>
                        </a>
                        <a class="next">
                            <p>></p>
                        </a>
                    </div>
                    <div class="bd">
                        <ul class="infoList">
                            <li class="page">
                                <a href="javascript:void(0);" target="_blank">
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                </a>
                            </li>
                            <li class="page">
                                <a href="javascript:void(0);" target="_blank">
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                </a>
                            </li>
                            <li class="page">
                                <a href="javascript:void(0);" target="_blank">
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                    <div class="item"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div style='clear:both;'></div>
        </div>
        
    </div>

</div>
<script>
    // 首页主要轮播
    $(".slideBox").slide({mainCell:".bd ul",effect:'fold',autoPlay:true});
    // 明星单品部分滚动
    $(".star-single .txtScroll-left").slide({mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,scroll:1,vis:1,trigger:"click",pnLoop:false});
    // 推荐商品部分滚动
    $(".recom-list .txtScroll-left").slide({mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,scroll:1,vis:1,trigger:"click",pnLoop:false});
    
    $(".main-slide .classify ul li, .main-slide .classify-second").mouseover(function(e){
        if($(".main-slide .classify-second").hasClass('hidden')){
            $(".main-slide .classify-second").removeClass("hidden");
        }
    });
    $(".main-slide .classify ul li, .main-slide .classify-second").mouseout(function(e){
        if(!$(".main-slide .classify-second").hasClass('hidden')){
            $(".main-slide .classify-second").addClass("hidden");
        }
    });
</script>
  
            <div class="bottom-bar"></div>
        </div>
    </body>
</html>