<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">Community社区</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}">首页 <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="{{Auth::user()->avatar}}" width="40px" class="img-circle nav-head-img" alt="{{Auth::user()->name}}的头像">
                            {{Auth::user()->name}} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('user/avatar')}}">修改头像</a></li>
                            <li><a href="{{url('user/change_password')}}">修改密码</a></li>
                            <li><a href="#">帮助中心</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{url('user/logout')}}">注销退出</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{url('user/login')}}">登 录</a></li>
                    <li><a href="{{url('user/register')}}">注 册</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>