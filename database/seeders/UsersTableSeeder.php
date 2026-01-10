<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DB操作に必要
use Illuminate\Support\Facades\Hash; // パスワードの暗号化に必要

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // データの登録
        DB::table('users')->insert([
            [
                'username' => 'test太郎',            // ユーザー名
                'email' => 'taro@example.com',    // メールアドレス
                'password' => Hash::make('password0000'), // 暗号化されたパスワード
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                // フォロー機能やログイン切り替え機能のテスト用
                'username' => 'test花子',
                'email' => 'hana@example.com',
                'password' => Hash::make('secret_pass'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
