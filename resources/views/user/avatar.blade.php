@extends('layouts.layout')
@section('title', '修改头像')
@section('content')
    <div class="container">
        <div class="row margin-top">
            <div class="col-md-6 col-md-offset-3">
                <div>
                    <img src="{{Auth::user()->avatar}}" width="150px" class="img-thumbnail margin-right" alt="">
                    <img src="{{Auth::user()->avatar}}" width="68px" class="img-thumbnail margin-right" alt="">
                    <img src="{{Auth::user()->avatar}}" width="49px" class="img-circle img-thumbnail margin-right" alt="">
                </div>
                <p class="margin-top">
                    <button class="btn btn-default">更换头像</button>
                </p>
                <p>
                    从电脑中选择图片上传, 图像大小不要超过 2 MB，长宽不要超过 3000 px
                </p>
            </div>
        </div>
    </div>
@endsection