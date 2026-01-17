<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function search()
    {
        return view('users.search');
    }

    public function index(Request $request)
    {
        // 検索フォームから入力されたワードを取得
        $keyword = $request->input('keyword');

        // 検索の基本クエリを作成（自分以外のユーザーを対象にする）
        // where('カラム名', '演算子', '値') の形
        $query = \App\Models\User::where('id', '!=', \Auth::id());

        // もし検索ワードが入力されていたら、そのワードで絞り込み
        if (!empty($keyword)) {
            $query->where('username', 'LIKE', "%{$keyword}%");
        }

        // 最終的な結果を取得
        $users = $query->get();

        // 検索ワード(keyword)も一緒にビューに渡すと、画面に「検索ワード：〇〇」と表示できる
        return view('users.search', compact('users', 'keyword'));
    }
}
