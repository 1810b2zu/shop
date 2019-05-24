<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Author" contect="http://www.webqin.net">
    <title>电影详情</title>
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
    <header>
        <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
        <div class="head-mid">
            <h1>产品详情</h1>
        </div>
    </header>
    <div id="sliderA" class="slider">
        <img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" />
        <img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" />
        <img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" />
        <img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" />
        <img src="{{url('images/u=1754891213,270226958&fm=27&gp=0.jpg')}}" />
    </div><!--sliderA/-->
    <table class="jia-len">
        <tr>
            <th><strong class="orange">14.25</strong></th>
            <td>
                <input type="text" class="spinnerExample" />
            </td>
        </tr>
        <tr>
            <td>
                <strong>三级分销农庄有机毛豆500g</strong>
                <p class="hui">富含纤维素，平衡每日膳食</p>
            </td>
            <td align="right">
                <a href="javascript:;" class="shoucang"><span class="glyphicon glyphicon-star-empty"></span></a>
            </td>
        </tr>
    </table>
    <div class="height2"></div>
    <h3 class="proTitle">清晰度</h3>
    <ul class="guige">
        <li class="guigeCur"><a href="javascript:;">标准</a></li>
        <li><a href="javascript:;">高清</a></li>
        <li><a href="javascript:;">超清</a></li>
        <li><a href="javascript:;">蓝光</a></li>
        <li><a href="javascript:;">清晰</a></li>
        <div class="clearfix"></div>
    </ul><!--guige/-->
    <div class="height2"></div>
    <div class="proinfoList">
      
    </div><!--proinfoList/-->
    <div class="proinfoList">
        暂无信息....
    </div><!--proinfoList/-->
    <div class="proinfoList">
        暂无信息......
    </div><!--proinfoList/-->
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
<!--jq加减-->
<script src="{{url('js/jquery.spinner.js')}}"></script>
<script>
    $('.spinnerExample').spinner({});
</script>
</body>
</html>