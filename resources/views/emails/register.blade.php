<p>
    {{$name}}，欢迎注册Community社区，这是一封邮箱确认邮件。
</p>
<p>
    <a href="{{url('user/register/confirm', $confirm_code)}}" class="btn btn-success">点击此处立即确认</a>
</p>
<p>
    如果按钮点击无效，请点击此处链接或者复制链接到浏览器访问：
</p>
<p>
    <a href="{{url('user/register/confirm', $confirm_code)}}">{{url('user/register/confirm', $confirm_code)}}</a>
</p>