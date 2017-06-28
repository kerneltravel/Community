@extends('layouts.layout')
@section('title', '首页')
@section('content')
    <div class="jumbotron bg-success">
        <div class="container">
            <h2>
                欢迎来到 Community社区！
                <a class="btn btn-danger pull-right" href="{{url('discussion/create')}}" role="button">发表新帖子</a>
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9 link-color-grey">
                @if(count($discussions) > 0)
                    @foreach($discussions as $discussion)
                        <div class="media">
                            <div class="media-left media-middle">
                                <a href="{{url('discussion', $discussion->id)}}">
                                    <img class="media-object img-circle" src="{{$discussion->User->avatar}}" width="64px" alt="{{$discussion->User->name}}的头像">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="{{url('discussion', $discussion->id)}}">
                                        {{$discussion->title}}
                                    </a>
                                    <div  class="pull-right text-center">
                                        <a href="{{url('discussion', $discussion->id)}}" class="center-block" title="评论总数">
                                            <span class="glyphicon glyphicon-comment"></span>
                                            <strong>{{count($discussion->comment)}}</strong>
                                        </a>
                                    </div>
                                </h4>
                                <p>
                                    <a href="{{url('user/info', $discussion->user_id)}}">{{$discussion->User->name}}</a>
                                    于 {{$discussion->created_at->diffForHumans()}} 发表
                                </p>
                            </div>
                        </div>
                    @endforeach
                    {!! $discussions->render() !!}
                @else
                    <div>
                        <p>暂无帖子</p>
                    </div>
                @endif
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection