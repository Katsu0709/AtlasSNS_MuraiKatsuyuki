<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        return view('follows.followList');
    }
    public function followerList()
    {
        return view('follows.followerList');
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
