@extends('layouts.layout')
@section('title', '注册成功')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h3>
                    恭喜您！注册成功。
                    <small>
                        <span id="second">10</span> 秒后跳转到
                        <a href="{{url('/')}}">首页</a>
                    </small>
                </h3>
                <p>
                    邮件发送失败或没收到邮箱确认邮件，请点此
                    <a href="">重新发送邮件</a>
                </p>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    var intDiff = parseInt(10);//倒计时总秒数量
    function timer(intDiff){
        window.setInterval(function(){
            if(intDiff > 0){
                $('#second').html(intDiff);
            } else {
                window.location.href = '/';
            }
            intDiff--;
        }, 1000);
    }
    $(function () {
        timer(intDiff);
    })
</script>
@endsection