<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin;
class LoginController extends Controller
{
    /*
     * @content 登录
     * */
    public function login(){
        return view('admin/login');
    }
    /*
     * @content 登录执行
     * */
    //登录执行
public function dologin(Request $request)
{

    $username=$request->username;
    $password=$request->password;
    $arr=Admin::where('uname','=',$username)->first();
    $pwd=$arr['pwd'];
    if(empty($arr)){
        
        //用户不存在
        echo"<script>alert('用户名或密码不正确');location.href='/admin/login'</script>";die;
    }else if($password==$pwd){
        session(['user'=>$arr['uname']]);
        echo"<script>alert('登录成功');location.href='/admin/index'</script>";
    }else{
        echo"<script>alert('登录失败');location.href='/admin/login'</script>";
    }

}
   
}
