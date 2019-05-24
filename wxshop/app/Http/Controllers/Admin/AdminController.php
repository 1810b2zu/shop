<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Muse;
use App\Model\Users;
use App\Model\Mediaid;
use CURLFile;
use Illuminate\Support\Facades\Redis;
class AdminController extends Controller
{
    /*
     * 后台首页
     * */
    public function index()
    {
        return view('admin.index');
    }
    //影音上传
    public function wxindex()
    {
        return view('admin.wxindex');
    }
    //上传永久素材
    public function wxup(Request $request)
    {
        if ($request->hasFile('picurl')) {
            $file=$request->picurl;
            $re=Muse::uploadsfile($file);
            $imgpath=$re['imgpath'];
//            dd($imgpath);die;
            $str=$re['str'];
            $token=Wechat::GetAccessToken();
            $type=Weixin::getType($str);
            $url="https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=$token&type=$type";
            $data=['media'=>new CURLFile(realpath($imgpath))];
//            dd($data);
            $re= Muse::HttpsPost($url,$data);
//   dd($re);
            $result=json_decode($re,true);
//        var_dump($result);die;
        }
        $data=[
           'video_mediaid'=>isset($result['video_mediaid'])?$result['video_mediaid']:NULL,
            'type'=>$request->input('type',NULL),
           'picurl'=>isset($result['url'])?$result['url']:NULL,
            'video_text'=>$request->input('video_text',NULL),
            'video_title'=>$request->input('video_title',NULL),
            'create_time'=>time()
        ];
       $re=Video::insert($data);
        // dd($data);die;
        if($re){
          return view('admin.wxindex');
        }
    }
/*
*群发显示
*
*/
 public function tags()
    {
        $data=Users::get();
        return view('admin.openidlist',['data'=>$data]);
    }
    /*
     * @content 根据openid群发
     * @param request mixed
     * */
    public function sendGroupOpenid(Request $request)
    {
        $openid = $request->openid;
        $data = rtrim($openid,',');
        $openidlist=explode(',',$data);

        $token = Wechat::GetAccessToken();
        $send_url="https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=$token";
        $content = " 有新的专辑和视频上线啦";
        $postdata = [
            'touser'=>$openidlist,
            'msgtype'=>'text',
            'text'=>[
                'content'=>$content,
            ]
        ];
//        dd($postdata);
        $postjson = json_encode($postdata,JSON_UNESCAPED_UNICODE);
        $res = Muse::HttpsPost($send_url,$postjson);
        dd($res);
    }
}