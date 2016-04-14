<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $comments = Comment::get();
        return view('comment', compact('comments'));
    }

    /**
     * 登録処理
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request)
    {
        Comment::create($request->all());
        return redirect('comment');
    }

    /**
     * 全件削除
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete()
    {
        // 削除は1件ずつ
        // select * from comments;
        $comments = Comment::get();
        foreach ($comments as $comment)
        {
            $comment->delete();
        }

        return redirect()->route('comment.index');
    }
}
