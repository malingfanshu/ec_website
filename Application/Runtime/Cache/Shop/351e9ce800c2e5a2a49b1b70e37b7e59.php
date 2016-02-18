<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($title); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="XX,XX商城">
        <meta name="description" content="XX商城首页">
        <link rel="shortcut icon" href="/ec_website/favicon.ico"/>
        
        
        <link rel="stylesheet" href="/ec_website/Public/Css/common.css"/>
        <link rel="stylesheet" href="/ec_website/Public/Shop/css/member.css"/>
        <script src="/ec_website/Public/js/jquery-1.11.3.min.js"></script>
        
        <!--弹窗插件-->
        <link rel="stylesheet" href="/ec_website/Public/Plugin/layer/skin/layer.css"/>
        <script src="/ec_website/Public/Plugin/layer/layer.js"></script>
        <!--前端验证插件-->
        <link rel="stylesheet" href="/ec_website/Public/Plugin/jquery-validation-engine/css/validationEngine.jquery.css"/>
        <script src="/ec_website/Public/Plugin/jquery-validation-engine/js/jquery.validationEngine-zh_CN.js"></script>
        <script src="/ec_website/Public/Plugin/jquery-validation-engine/js/jquery.validationEngine.min.js"></script>
        <!--日历插件-->
        <link rel="stylesheet" href="/ec_website/Public/Plugin/jquery.cxcalendar-1.5/css/jquery.cxcalendar.css"/>
        <script src="/ec_website/Public/Plugin/jquery.cxcalendar-1.5/js/jquery.cxcalendar.min.js"></script>
        <script src="/ec_website/Public/Js/common.js"></script>
        <!--Superslide v2.1-->
        <script src="/ec_website/Public/Plugin/superslide-2.1/jquery.SuperSlide.2.1.js"></script>
    </head>
    <body>
        <header>
    <div class="top-bar H35">
        
    </div>
    <div class="header-bar main-block H100">
        <div class="center-block">
            <div class="site-logo"></div>
            <div class="header-nav">
                <ul>
                    <li class="horizontal-block clear-right-padding"></li>
                    <li><a href="javascript:void(0);">产品列表1</a></li>
                    <li><a href="javascript:void(0);">产品列表2</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
        <div class="main-block">
    <div class="main-slide center-block">
        <div class="classify">
            <ul class="clear-margin clear-left-padding">
                <div class="H15"></div>
                <li><a>分类1</a></li>
                <li><a>分类2</a></li>
                <li><a>分类3</a></li>
                <div class="H15"></div>
            </ul>
        </div>
        <div class="classify-second hidden">
            <ul class="clear-margin clear-left-padding">
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品1</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品2</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品3</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品4</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品5</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品6</span>
                    </a>
                </li>
            </ul>
            <ul class="clear-margin clear-left-padding">
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品1</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品2</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品3</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品4</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品5</span>
                    </a>
                </li>
                <li>
                    <a>
                        <image src="/ec_website/Public/Image/icon/iconfont-Txu.png"></image>
                        <span>产品6</span>
                    </a>
                </li>
            </ul>
        </div>
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
                    <li><a href="javascript:void(0);" target="_blank"><img src="/ec_website/Public/Image/slide-1.jpg" /></a></li>
                    <li><a href="javascript:void(0);" target="_blank"><img src="/ec_website/Public/Image/slide-2.jpg" /></a></li>
                </ul>
            </div>
            <div class="slide-control-button">
                <a class="prev" href="javascript:void(0)">前</a>
                <a class="next" href="javascript:void(0)">后</a>
            </div>
        </div>
    </div>
</div>
<script>
    // 首页主要轮播
    $(".slideBox").slide({mainCell:".bd ul",autoPlay:true});
    // 
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

        
    </body>
</html>