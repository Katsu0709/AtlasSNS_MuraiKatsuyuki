<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    // ログインユーザーがフォローしているユーザーをすべて取得
    public function followList()
    {
        // 自分がフォローしている人のIDを配列で取得
        $following_ids = auth()->user()->follows()->pluck('followed_id');

        // そのIDに一致するユーザーの投稿を、新しい順に取得
        $posts = \App\Models\Post::whereIn('user_id', $following_ids)->with('user')->latest()->get();

        // 取得した投稿データをビューに渡す
        return view('follows.followList', ['following_users' => auth()->user()->follows()->get(), 'posts' => $posts]);
    }

    public function followerList()
    {
        // 自分をフォローしてくれているユーザーを取得
        $follower_users = auth()->user()->followers()->get();

        // フォロワーたちのIDを配列で取得
        $follower_ids = $follower_users->pluck('id');

        // フォロワーたちの投稿を新しい順に取得
        $posts = \App\Models\Post::whereIn('user_id', $follower_ids)->with('user')->latest()->get();

        return view('follows.followerList', ['follower_users' => $follower_users, 'posts' => $posts]);
    }

    // フォローする
    public function follow(Request $request)
    {
        auth()->user()->follows()->attach($request->followed_id);
        return back();
    }

    // フォロー解除
    public function unfollow(Request $request)
    {
        auth()->user()->follows()->detach($request->followed_id);
        return back();
    }
}
