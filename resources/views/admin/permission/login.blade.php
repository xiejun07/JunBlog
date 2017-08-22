@extends('layouts.default')
@section('content')
<style>
    body{
        background: #F3F3F4;
    }
</style>
<div class="login_box">
    <h1>Blog</h1>
    <h2>欢迎使用博客管理平台</h2>
    <div class="form">
        @if(session('errors'))
            <p style="color:red">{{session('errors')}}</p>
        @endif
        <form action="{{url('checkLogin')}}" method="post">
            {{csrf_field()}}
            <ul>
                <li>
                    <input type="text" name="username" class="text" style="height: 33px"/>
                    <span><i class="fa fa-user"></i></span>
                </li>
                <li>
                    <input type="password" name="password" class="text"  style="height: 33px"/>
                    <span><i class="fa fa-lock"></i></span>
                </li>
                <li>
                    <input type="text" class="code" name="code"  style="height: 33px"/>
                    <span><i class="fa fa-check-square-o"></i></span>
                    <img src="#" alt="">
                </li>
                <li>
                    <input type="submit" value="立即登陆"/>
                </li>
            </ul>
        </form>
        <p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="javascript:;" target="_blank">xiejun941107@gmail.com</a></p>
    </div>
</div>

@section('script')

@endsection

@endsection

