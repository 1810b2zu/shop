<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>音乐 电影 分享</title>
    <link rel="shortcut icon" href="{{url('images/favicon.ico')}}" />

    <!-- Bootstrap -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/response.css')}}" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="maincont">
    <div class="head-top">
        <img src="{{url('images/u=2174826623,1098161676&fm=58&s=75976F3EA5F04E314E70817E03007033&bpow=121&bpoh=75_wps图片.jpg')}}" />
        <dl>
            <dt><a href="user.html"><img src="{{url('images/touxiang.jpg')}}" /></a></dt>
            <dd>
                <h1 class="username">影音大全</h1>
                <ul>
                    <li><a href="prolist.html"><strong>34</strong><p>全部影音</p></a></li>
                    <li><a href="javascript:;"><span class="glyphicon glyphicon-star-empty"></span><p>收藏</p></a></li>
                    <li style="background:none;"><a href="javascript:;"><span class="glyphicon glyphicon-picture"></span><p>二维码</p></a></li>
                    <div class="clearfix"></div>
                </ul>
            </dd>
            <div class="clearfix"></div>
        </dl>
    </div><!--head-top/-->
    <form action="#" method="get" class="search">
        <input type="text" class="seaText fl" />
        <input type="submit" value="搜索" class="seaSub fr" />
    </form><!--search/-->
    <ul class="reg-login-click">
        <li><a href="login.html">登录</a></li>
        <li><a href="reg.html" class="rlbg">注册</a></li>
        <div class="clearfix"></div>
    </ul><!--reg-login-click/-->
    <div id="sliderA" class="slider">
        <img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" />
        <img src="{{url('images/u=507349215,723386858&fm=15&gp=0.jpg')}}" />
        <img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" />
        <img src="{{url('images/u=507349215,723386858&fm=15&gp=0.jpg')}}" />
        <img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" />
    </div><!--sliderA/-->
    <ul class="pronav">
        <li><a href="prolist">最新电影</a></li>
        <li><a href="prolist">最热电影</a></li>

        <div class="clearfix"></div>
    </ul><!--pronav/-->
    <div class="index-pro1">
        <div class="index-pro1-list">
            <dl>
                <dt><a href="/index/proinfo"><img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" /></a></dt>
                <dd class="ip-text">
                    <a href="/index/proinfo">电影名称</a>
                    <span>观看量：488</span></dd>
                <dd class="ip-price"><strong>¥299</strong>
                    <span>¥599</span></dd>
            </dl>
        </div>
        <div class="index-pro1-list">
            <dl>
                <dt><a href="/index/proinfo"><img src="{{url('images/u=507349215,723386858&fm=15&gp=0.jpg')}}" /></a></dt>
                <dd class="ip-text">
                    <a href="/index/proinfo">电影名称</a>
                </dd>
                <dd class="ip-price"><strong>¥299</strong>
                    <span>¥599</span></dd>
            </dl>
        </div>

        <div class="clearfix"></div>
    </div><!--index-pro1/-->
    <div class="joins"><a href="fenxiao.html"><img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" /></a></div>
    <div class="copyright">Copyright &copy; <span class="blue">这是就是电影分享底部信息</span></div>

    <div class="height1"></div>
    <div class="footNav">
        <dl>
            <a href="/index/add">
                <dt><span class="glyphicon glyphicon-home"></span></dt>
                <dd>微店</dd>
            </a>
        </dl>
        <dl>
            <a href="prolist.html">
                <dt><span class="glyphicon glyphicon-th"></span></dt>
                <dd>所有共享电影</dd>
            </a>
        </dl>
        <dl>
            <a href="/index/user">
                <dt><span class="glyphicon glyphicon-user"></span></dt>
                <dd>我的</dd>
            </a>
        </dl>
        <div class="clearfix"></div>
    </div><!--footNav/-->
</div><!--maincont-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{url('js/jquery.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{url('js/bootstrap.min.js')}}"></script>
<script src="{{url('js/style.js')}}"></script>
<!--焦点轮换-->
<script src="{{url('js/jquery.excoloSlider.js')}}"></script>
<script>
    $(function () {
        $("#sliderA").excoloSlider();
    });
</script>
</body>
</html>