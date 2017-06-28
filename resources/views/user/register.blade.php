@extends('layouts.layout')
@section('title', '注册')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{url('user/register')}}" method="post" class="margin-top">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="name">用户名：</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="请输入用户名">
                    </div>
                    <div class="form-group">
                        <label for="email">电子邮箱：</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="请输入电子邮箱">
                    </div>
                    <div class="form-group">
                        <label for="password">密码：</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="请输入密码">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">确认密码：</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="请再输一次密码">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">立即注册</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection