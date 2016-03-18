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
                <script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=&amp;style=10&amp;bgcolor=Orange&amp;ssc=false"></script>
<div class="center-block">
    <div class='nav-breadcrumb'>
        <?php if($class_info != ''): ?><a href="javascript:void(0);">首页</a><span>></span><a href="javascript:void(0);"><?php echo ($class_info['gc_1']['gc_name']); ?></a><span>></span><a href="javascript:void(0);"><?php echo ($class_info['gc_2']['gc_name']); ?></a><span>></span><a href="javascript:void(0);"><?php echo ($class_info['gc_3']['gc_name']); ?></a>
        <?php else: ?>
            <?php if($choose_info != ''): ?>首页>"<?php echo ($choose_info); ?>"全部结果<?php endif; endif; ?>
    </div>
</div>
<div class="center-block goods-body">
    <div class="left-block">
        <div class="up-block">
            <div class="show-pictures">
                
                <div class="picFocus">
                    <div class="bd">
                        <ul>
                            <?php if(is_array($goods_info[goods_pic][pic_list])): $i = 0; $__LIST__ = $goods_info[goods_pic][pic_list];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="javascript:void(0);"><img src="<?php echo ($vo); ?>" /></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                    <div class="hd">
                        <ul class="clear-padding">
                            <?php if(is_array($goods_info[goods_pic][pic_list])): $i = 0; $__LIST__ = $goods_info[goods_pic][pic_list];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><img src="<?php echo ($vo); ?>" /></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            <div style="clear:both;"></div>
                        </ul>
                    </div>
		</div>
                <div class="fn">
                    <div class="favorite"><img src="/Public/Image/icon/iconfont-shoucangweishoucang-copy.png" /><span>收藏</span></div>
                    <div class="share"><a class="bshareDiv" href="http://www.bshare.cn/share"><img src="/Public/Image/icon/iconfont-fenxiang.png" /><span>分享</span></a></div>
                    <div style="clear:both;"></div>
                </div>
            </div>
            <div class="goods-info">
                <div class="goods-name">
                    <b><?php echo $goods_info['goods_name'];?></b>
                </div>
                <div class="price-info">
                    <div class="up"></div>
                    <div class="down">
                        <div class="item">
                            <span class="name">价格</span>
                            <span class="content">￥499</span>
                        </div>
                        <div class="item">
                            <span class="name">运费</span>
                            <span class="content">￥0</span>
                        </div>
                    </div>
                </div>
                <div class="sale-volumn">
                    <div>月销量<span>155575</span></div>
                    <div>累计评价<span>155575</span></div>
                    <div style="clear:both;"></div>
                </div>
                
                <div class="specification">
                    <div class="item">
                        <div class="specification-name">
                            <span>颜色<span>
                        </div>
                        <div class="specification-type">
                            <ul class="clear-padding clear-margin">
                                <li class="on">A颜色</li>
                                <li>B颜色</li>
                                <div style="clear:both;"></div>
                            </ul>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="item">
                        <div class="specification-name">
                            <span>尺寸</span>
                        </div>
                        <div class="specification-type">
                            <ul class="clear-padding clear-margin">
                                <li>C尺寸</li>
                                <li class="on">D尺寸</li>
                                <div style="clear:both;"></div>
                            </ul>
                        </div>
                        <div style="clear:both;"></div>
                    </div>
                    <div class="item">
                        <div class="specification-name"><span>数量</span></div>
                        <span class="volume">
                            <input class="num" type="text" value="1" />
                            <span class="control">
                                <span class="up">&nbsp;△&nbsp;</span>
                                <span class="down">&nbsp;▽&nbsp;</span>
                            </span>
                            <span class="inventory">&nbsp;&nbsp;&nbsp;&nbsp;库存3</span>
                        </span>
                        
                    </div>
                </div>
                
                <div class="purchasing-behavior">
                    <div class="buy-now"><span>立即购买</span></div>
                    <div class="add-cart"><span>加入购物车</span></div>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="down-block">
            <div class="select">
                <ul class="clear-padding clear-margin">
                    <li class="on"><span>商品详情<span></li>
                    <li><span>累计评价15535</span></li>
                    <div style="clear:both;"></div>
                </ul>
            </div>
            <div class="show">
                <div class="goods-detail">
                    详情部分
                </div>
                <div class="goods-evaluation none">
                    评价部分
                </div>
            </div>
        </div>
    </div>
    <div class="right-block">
        <div class="title">推荐商品位置</div>
        <div class="item">
            <div class="image">
                <img src="/Public/Image/test/hongmi2_hong_1.png" />
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
                <img src="/Public/Image/test/hongmi2_hong_1.png" />
            </div>
            <div class="goods-name">
                <span>某某商品</span>
            </div>
            <div class="goods-price">
                <span>￥200</span>
            </div>
        </div>
        <div class="item">
            <div class="image">
                <img src="/Public/Image/test/hongmi2_hong_1.png" />
            </div>
            <div class="goods-name">
                <span>某某商品</span>
            </div>
            <div class="goods-price">
                <span>￥200</span>
            </div>
        </div>
    </div>
    <div style="clear:both;"></div>
</div>
<!--页面隐藏值-->
<input type="hidden" id="hidden_value" value={inventory:"3"} />
<script>
    // 商品图片展示
    $(".picFocus").slide({ mainCell:".bd ul",effect:"left",autoPlay:true });
    
    // 商品详情和商品评价切换
    $(".goods-body .left-block .down-block .select ul li").on("click",function(e){
        if(!$(e.target).hasClass("on")){
            $(e.target).addClass("on");
        }
        $(this).parent().children("li").each(function(index,ele){
            $(ele).removeClass("on");
        });
        $(this).addClass("on");
        var index = $(this).index();
        $(".goods-body .left-block .down-block .show div").each(function(i,ele){
            if(!$(ele).hasClass("none")){
                $(ele).addClass("none");
            }
        });
        $(".goods-body .left-block .down-block .show div:eq("+index+")").removeClass("none");
    });
    
    // 规格切换效果
    $(".goods-body .left-block .up-block .goods-info .specification .specification-type ul li").on("click",function(e){
        $(this).parent().children("li").each(function(index,ele){
            $(ele).removeClass("on");
        });
        if(!$(this).hasClass("on")){
            $(this).addClass("on");
        }
    });
    
    // 购买数量增减
    $("div.specification div.item span.volume span.control .up").on("click",function(e){
        var ele_num = $("div.specification div.item span.volume input.num");
        var now_num = parseInt(ele_num.val());
        var hidden_value = eval("(" + $('#hidden_value').val() + ")");
        if(now_num+1 <= parseInt(hidden_value['inventory'])){
            ele_num.val(now_num+1);
        }
    });
    $("div.specification div.item span.volume span.control .down").on("click",function(e){
        var ele_num = $("div.specification div.item span.volume input.num");
        var now_num = parseInt(ele_num.val());
        if(now_num-1 >= 1){
            ele_num.val(now_num-1);
        }
    });
</script>  
            <div class="bottom-bar"></div>
        </div>
    </body>
</html>