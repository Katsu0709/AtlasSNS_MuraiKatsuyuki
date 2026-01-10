<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            // ユーザー名：入力必須、2文字以上、12文字以内
            'username' => ['required', 'string', 'min:2', 'max:12'],

            // メールアドレス：入力必須、5文字以上、40文字以内、重複不可、メール形式
            'email' => ['required', 'string', 'email', 'min:5', 'max:40', 'unique:users,email'],

            // パスワード：入力必須、英数字のみ、8文字以上、20文字以内、確認欄と一致
            'password' => ['required', 'string', 'alpha_num', 'min:8', 'max:20', 'confirmed'],

            // パスワード確認：入力必須、英数字のみ、8文字以上、20文字以内
            'password_confirmation' => ['required', 'string', 'alpha_num', 'min:8', 'max:20'],
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('added');
    }

    public function added(): View
    {
        return view('auth.added');
    }
}
