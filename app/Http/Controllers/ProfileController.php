<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function profile($id)
    {
        // URLのIDを使って、表示したいユーザーの情報を1件取得
        $user = \App\Models\User::findOrFail($id);

        // そのユーザーの投稿も一緒に取得
        $posts = \App\Models\Post::where('user_id', $id)->latest()->get();

        // ユーザー情報と投稿をビューに渡す
        return view('profiles.profile', compact('user', 'posts'));
    }

    // 自分の編集画面を表示
    public function edit()
    {
        $user = Auth::user();
        return view('profiles.profileEdit', compact('user'));
    }

    // 更新処理
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'username' => 'required|string|min:2|max:12',
            'email' => [
                'required',
                'string',
                'email',
                'min:5',
                'max:40',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'required|string|alpha_num|min:8|max:20|confirmed',
            'password_confirmation' => 'required|string|alpha_num|min:8|max:20',
            'bio' => 'nullable|string|max:150',
            'icon_image' => 'nullable|image|mimes:jpg,png,bmp,fid,svg',
        ]);

        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->bio = $request->bio;

        if ($request->hasFile('icon_image')) {
            $file = $request->file('icon_image');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            $user->icon_image = $fileName;
        }

        $user->save();
        return redirect()->route('top');
    }
}
