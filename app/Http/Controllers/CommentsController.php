<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\PostCommentRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(PostCommentRequest $request)
    {
        $data = [
            'user_id' => Auth::user()->id
        ];
        $save = Comment::create(array_merge($request->all(), $data));
        if ($save) {
            return redirect()->action('PostsController@show', ['id' => $request->input('discussion_id')])->with('success', '评论成功！');
        } else {
            return redirect()->action('PostsController@show', ['id' => $request->input('discussion_id')])->withInput()->withErrors('出错了，评论帖子失败，请稍后重试！');
        }
    }
}
