<?php
namespace App\Http\Controllers\Weixin;
use App\Http\Controllers\Controller;
use App\Model\Muse;
use App\Model\Video;
Class WeixinController extends Controller
{
    /**
     * 连接微信与服务器的绑定
     */
    public function valid(Request $request)
    {
        $echostr  =$request->echostr;
//        //echo $echostr;
        if(empty($echostr)){
            $this->responseMsg();
        }else{
            $this->CheckSignature();
            echo $echostr;exit;
        }
////        if($this->CheckSignature()){
////            //
////            echo $echostr;exit;
////        }
    }

    //服务器和微信号的绑定
    private function CheckSignature()
    {
        $signature  =  $_GET['signature'];
        $timestamp =  $_GET['timestamp'];
        $nonce  =  $_GET['nonce'];
        $token = env('WEIXINTOKEN');
        //将三个参数写入数组2
        $arr = array($token,$timestamp,$nonce);
        //字典排序
        sort($arr,SORT_STRING);
        //拼接参数
        $str = implode($arr);
        //sha1 加密
        $sign = sha1($str);
        if($sign == $signature){
            return true;
        }else{
            return false;
        }
    }

//    推送消息
public function responseMsg()
{
    //接收微信请求的所有内容
    $postStr = file_get_contents("php://input");

    //转成对象
    $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
    $fromUsername = $postObj->FromUserName;//请求信息的用户
//    file_put_contents('/tmp/responseMsg.log',$fromUsername,FILE_APPEND);
    $toUsername = $postObj->ToUserName;//“我”的公众号id
    $time = time();//时间戳
    $keywords = $postObj->Content;
    $type=$postObj->MsgType;
    $MediaId=$postObj->MediaId;
        if ($postObj->MsgType == 'event') {
            if ($postObj->Event == 'subscribe') {//如果是订阅号
                $contentStr = "欢迎关注影音公众号,让我们一起来探索吧";
                     $msgtype = 'text';//消息类型：文本
                     $textTpl = "<xml>
                              <ToUserName><![CDATA[%s]]></ToUserName>
                             <FromUserName><![CDATA[%s]]></FromUserName>
                             <CreateTime>%s</CreateTime>
                             <MsgType><![CDATA[%s]]></MsgType>
                             <Content><![CDATA[%s]]></Content>
                            </xml>";
                    $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgtype, $contentStr);
                    echo $resultStr;
            }
        }
        //关键字
        if ($keywords == '影音大全') {
            $contentStr = "这是电影兼音乐的一种公众号";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgtype, $contentStr);
            echo $resultStr;
            exit();
        }else if($keywords=='最新电影'){
            $videoTel="<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <Video>
                    <MediaId><![CDATA[%s]]></MediaId>
                    <Title><![CDATA[%s]]></Title>
                    <Description><![CDATA[%s]]></Description>
                </Video>
                </xml>";
             $data = Video::where('type', 'video')->OrderBy('video_id', 'desc')->first();
            $msgtype='video';
            $mediaid=$data->video_mediaid;
            $title=$data->video_title;
            $description=$data->video_text;
            $resultStr = sprintf($videoTel, $fromUsername, $toUsername, $time, $msgtype, $mediaid,$title,$description);
            echo $resultStr;
            exit();
        }else if($keywords=='最新音乐'){
            $voicTel=" <xml>
                  <ToUserName><![CDATA[%s]]></ToUserName>
                  <FromUserName><![CDATA[%s]]></FromUserName>
                  <CreateTime>%s</CreateTime>
                  <MsgType><![CDATA[%s]]></MsgType>
                  <Voice>
                    <MediaId><![CDATA[%s]]></MediaId>
                  </Voice>
                </xml>";
            $msgtype='voice';
            $data = Video::where('type', 'voice')->OrderBy('video_id', 'desc')->first();
            $mediaid=$data->video_mediaid;
            $resultStr = sprintf($voicTel, $fromUsername, $toUsername, $time, $msgtype, $mediaid);
            echo $resultStr;
            exit();
        }
    }
}