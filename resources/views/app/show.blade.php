@extends('layouts.layout')
@section('title', $discussion->title)
@section('content')
    <div class="jumbotron bg-success">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2>
                        {{$discussion->title}}
                    </h2>
                    <h5>
                        <a href="{{url('user/info', $discussion->user_id)}}">{{$discussion->User->name}}</a>
                        于 {{$discussion->created_at->diffForHumans()}} 发表
                    </h5>
                </div>
                <div class="col-md-3">
                    <h2>
                        @if(Auth::check() && Auth::user()->id === $discussion->user_id)
                        <a class="btn btn-danger pull-right" href="{{url('discussion/edit', $discussion->id)}}" role="button">修改帖子</a>
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div>
                    {!! \GrahamCampbell\Markdown\Facades\Markdown::convertToHtml($discussion->body) !!}
                </div>
                @if(count($discussion->comment) > 0)
                <hr/>
                <div>
                    @foreach($discussion->comment as $comment)
                        <div class="media">
                            <div class="media-left">
                                <a href="{{url('user/info')}}">
                                    <img class="media-object img-circle" src="{{$comment->user->avatar}}" width="64px" alt="{{$comment->user->name}}的头像">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->user->name}}</h4>
                                <div>
                                    {{$comment->body}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
                <hr/>
                @if(Auth::check())
                <form action="{{url('comment')}}" method="post" class="margin-bottom">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="login">评论内容：</label>
                        <input type="hidden"  name="discussion_id" value="{{$discussion->id}}">
                        <textarea class="form-control" name="body" rows="5" placeholder="请输入评论内容"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">发表评论</button>
                    </div>
                </form>
                @else
                    <a href="{{url('user/login')}}" class="btn btn-block btn-success margin-bottom">登录参与评论</a>
                @endif
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection