<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //前台首页
    public function index()
    {
     return view('index/index');
    }
    //个人中心
    public function user()
    {
      return view('index/user');
    }
    //详情页面
    public function proinfo()
    {
        return view('index/proinfo');
    }
}
