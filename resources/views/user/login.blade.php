@extends('layouts.layout')
@section('title', '登录')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{url('user/login')}}" method="post" class="margin-top">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="login">用户名/电子邮箱：</label>
                        <input type="text" class="form-control" name="login" id="login" placeholder="请输入用户名/电子邮箱">
                    </div>
                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="请输入密码">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">立即登录</button>
                    </div>
                    <div class="form-group">
                        <a href="{{url('user/register')}}">立即注册</a>
                        <span class="pull-right">
                            忘记密码？
                            <a href="{{url('user/rest')}}">立即重置</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection