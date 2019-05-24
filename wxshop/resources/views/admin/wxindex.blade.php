<html>
<head>
    <meta charset="UTF-8">
    <title>上传影音</title>

    <link rel="stylesheet" href="{{url('/css/weui.css')}}">
</head>

<body>



<form action="/admin/wxup" method="post" enctype="multipart/form-data" class="layui-form">
    @csrf
    <div class="weui-cell weui-cell_select weui-cell_select-after">
        <div class="weui-cell__hd">
            <label for="" class="weui-label">选择回复类型</label>
        </div>
        <div class="weui-cell__bd">
            <select class="weui-select" name="type" id="type">
                <option value="">请选择</option>
                <option value="video">视频</option>
                <option value="voice">音乐</option>
            </select>
        </div>
    </div>
    <div id="content"></div>
    <input type="submit" value="提交" class="weui-btn weui-btn_primary">
</form>
</body>
</html>
<script src="{{url('js/jquery-1.11.2.min.js')}}"></script>
<script>
    $('#type').change(function(){
        var type = $(this).val();
        
             if(type=='voice'){
            var str = '<div class="weui-cell"><div class="weui-cell__hd"><label class="weui-label">选择文件</label></div><div class="weui-cell__bd"><input class="weui-input" type="file" name="picurl"/></div></div>';
            $("#content").html(str);
        }else if(type == 'video')
            var str = '<div class="weui-cell"><div class="weui-cell__hd"><label class="weui-label">选择文件</label></div><div class="weui-cell__bd"><input class="weui-input" type="file" name="picurl"/></div></div></div><div class="weui-cell"><div class="weui-cell__hd"><label class="weui-label">标题</label></div><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="请输入标题" name="video_title"/></div></div></div><div class="weui-cell"><div class="weui-cell__hd"><label class="weui-label">简介</label></div><div class="weui-cell__bd"><input class="weui-input" type="text" placeholder="请输入简介" name="video_text"/></div></div>';
            $("#content").html(str);

    })
</script>

