<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $discussions = Discussion::orderBy('created_at', 'desc')->paginate(15);
        return view('app.index', compact('discussions'));
    }

    public function show($id)
    {
        $discussion = Discussion::findOrFail($id);
        return view('app.show', compact('discussion'));
    }

    public function create()
    {
        return view('app.create');
    }

    public function store(Requests\StorePostsRequest $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'last_user_id' => Auth::user()->id,
        ];
        $discussion = Discussion::create(array_merge($request->all(), $data));
        if ($discussion) {
            return redirect()->action('PostsController@show', ['id' => $discussion->id])->with('success', '发表成功！');
        } else {
            return redirect('/discussion/create')->withInput()->withErrors('出错了，发表帖子失败，请稍后重试！');
        }
    }

    public function update($id)
    {
        $discussion = Discussion::findOrFail($id);
        if (Auth::user()->id !== $discussion->user_id) {
            return redirect('/')->withErrors('对不起，您没有权限修改此文章！');
        }
        return view('app.edit',compact('discussion'));
    }
    public function save(Requests\StorePostsRequest $request, $id = '')
    {
        $discussion = Discussion::findOrFail($id);
        if (Auth::user()->id !== $discussion->user_id) {
            return redirect('/')->withErrors('对不起，您没有权限修改此文章！');
        }
        $data = [
            'last_user_id' => Auth::user()->id,
        ];
        $update = $discussion->update(array_merge($request->all(), $data));
        if ($update) {
            return redirect()->action('PostsController@show', ['id' => $discussion->id])->with('success', '修改成功！');
        } else {
            return redirect('/discussion/edit', $discussion->id)->withInput()->withErrors('出错了，修改帖子失败，请稍后重试！');
        }
    }
}
