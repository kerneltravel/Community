@extends('layouts.layout')
@section('title', '发表新帖')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="{{url('discussion/create')}}" method="post" class="margin-top">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="title">标题：</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="请输入标题">
                    </div>
                    <div class="form-group">
                        <label for="body">正文：</label>
                        <textarea class="form-control" rows="8" name="body" id="body" placeholder="请输入正文"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">发表帖子</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection