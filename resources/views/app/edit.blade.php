@extends('layouts.layout')
@section('title', '编辑'.$discussion->title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{url('discussion/edit', $discussion->id)}}" method="post" class="margin-top">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="title">标题：</label>
                        <input
                                type="text"
                                class="form-control"
                                name="title"
                                id="title"
                                placeholder="请输入标题"
                                value="{{$discussion->title}}">
                    </div>
                    <div class="form-group">
                        <label for="body">正文：</label>
                        <textarea
                                class="form-control"
                                rows="8"
                                name="body"
                                id="body"
                                placeholder="请输入正文"
                                >{{$discussion->body}}</textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">更新帖子</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection