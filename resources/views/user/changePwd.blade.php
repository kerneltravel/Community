@extends('layouts.layout')
@section('title', '修改密码')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="{{url('user/change_password')}}" method="post" class="margin-top">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="old_password">旧密码：</label>
                        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="请输入旧密码">
                    </div>
                    <div class="form-group">
                        <label for="password">新密码：</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="请输入新密码">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">确认新密码：</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="请再输入一次新密码">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">立即修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection