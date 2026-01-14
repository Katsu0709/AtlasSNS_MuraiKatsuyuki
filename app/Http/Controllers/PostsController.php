<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostsController extends Controller
{
    public function index()
    {
        // 1. 自分とフォローしているユーザーのIDを配列で取得
        $user_ids = Auth::user()->follows()->pluck('followed_id')->toArray();
        $user_ids[] = Auth::id(); // 自分のIDを追加

        // 2. そのIDに一致する投稿を取得（新しい順）
        $posts = Post::whereIn('user_id', $user_ids)
            ->with('user') // N+1問題対策(ループの中でデータベースに何度も問い合わせてしまい、動作が重くなること)：投稿に紐づくユーザー情報もまとめて取得
            ->latest()     // created_at の降順（新しい順）
            ->get();

        return view('posts.index', compact('posts'));
    }

    public function postCreate(Request $request)
    {
        // バリデーション
        $request->validate([
            'newPost' => 'required|string|min:1|max:150',
        ]);

        // 入力内容を取得
        $post_content = $request->input('newPost');
        $user_id = Auth::id(); // ログインしているユーザーのID

        // データベースに保存
        Post::create([
            'user_id' => $user_id,
            'post' => $post_content,
        ]);

        // トップページにリダイレクト
        return redirect('/top');
    }

    public function postUpdate(Request $request)
    {
        // バリデーション
        $request->validate([
            'upPost' => 'required|string|min:1|max:150',
        ]);

        // フォームから送られてきた値を取得
        $id = $request->input('id');
        $up_post = $request->input('upPost');

        // データベースを更新
        \App\Models\Post::where('id', $id)
            ->where('user_id', \Auth::id())
            ->update(['post' => $up_post]);

        // 4. トップページにリダイレクト
        return redirect('/top');
    }

    public function postDelete($id)
    {
        // 指定されたIDの投稿のうち、自分のIDのものだけを削除
        \App\Models\Post::where('id', $id)
            ->where('user_id', \Auth::id())
            ->delete();

        return redirect('/top');
    }
}
