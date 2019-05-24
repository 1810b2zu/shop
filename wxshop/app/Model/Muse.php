<?php
namespace App\Model;
use Illuminate\Support\Facades\Storage;
class Muse
{
//post的方式
    public static function HttpsPost($url,$post_datas)
    {
        //1、初始化
        $curl = curl_init();
      //2、设置选项，包括URL
      curl_setopt($curl, CURLOPT_URL, $url);
      //将curl_exec()获取的信息以文件流的形式返回，而不是直接输出
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     //启动时会将头文件的信息作为数据流输出
     curl_setopt($curl, CURLOPT_HEADER, 0);
        //设置为post
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        //把post的变量加上
     curl_setopt($curl, CURLOPT_POSTFIELDS,$post_datas);
     //3、执行并获取HTML文档内容
     $data=curl_exec($curl);
     //4、释放句柄
     curl_close($curl);
     return $data;
    }
        /*
     * 把access_token存入文件中
     * */
public static function GetAccessToken()
{

    $filepath=public_path()."/wx/token.txt";
    //文件内容读取
    $fileinfo=file_get_contents($filepath);
    //判断
    if(!empty($fileinfo)){
        $data=json_decode($fileinfo,true);
        $expire=$data['expire'];
        if(time()>$expire){
            $token=self::createAccessToken();
            $time=time()+7100;
            $arr=[
                'token'=>$token,
                'expire'=>$time,
            ];

            $content=json_encode($arr,JSON_UNESCAPED_UNICODE);
//            chmod($fileinfo,0777);
            file_put_contents($filepath,$content);

        }else{
            $token=$data['token'];
        }
    }else{
      $token=self::createAccessToken();
      $time=time()+7100;
      $arr=[
          'token'=>$token,
          'expire'=>$time,
      ];
      $content=json_encode($arr,JSON_UNESCAPED_UNICODE);
      file_put_contents($filepath,$content);
    }
    return $token;
}
/*
     * 获取access_token
     * */
    private static function createAccessToken()
    {
        $appid=env('WXAPPID');
        $appsecret=env('WXAPPSECRET');
        $url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        $re= file_get_contents($url);
        $token=json_decode($re,true)['access_token'];
        return $token;
    }
    //文件上传
public static  function uploadsfile($file)
{

    //获取文件的类型
    $str=$file->getclientMimeType();
//  echo $str;die;
//       $type=Weixin::getType($str);
    //获取文件的后缀名
    $ext=$file->getClientOriginalExtension();
    //获取文件位置
    $path=$file->getRealpath();
//    echo $path;die;
    //上传的文件名称
    $newfilename=date('Ymd')."/".mt_rand(1111,9999).".".$ext;
//    echo $newfilename;die;
    //上传
    Storage::disk('uploads')->put($newfilename,file_get_contents($path));
    $imgpath=public_path().'/uploads/'.$newfilename;
   
    $data=['str'=>$str,'imgpath'=>$imgpath];
    return $data;
}
//获取关注列表
public static function GetOpenIdList()
{
    $token = self::GetAccessToken();
//        $url='';
    $data = Redis::get('data');
    if(empty($data)){
        $url  = "https://api.weixin.qq.com/cgi-bin/user/get?access_token=".$token;
        $res = file_get_contents($url);
        $data = json_decode($res,true)['data']['openid'];
        $data = json_encode($data);
        Redis::set('data',$data);
        Redis::expire('data',86400);
        $data = Redis::get('data');
    }else{
        $data =Redis::get('data');
    }
    $data = json_decode($data,true);
    return $data;
}
}