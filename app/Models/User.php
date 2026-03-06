<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // フォローしているユーザーを取得
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }

    // フォロワーを取得
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }

    // 自分がフォローしている人の中に、指定したIDのユーザーがいるか判定
    public function isFollowing($user_id)
    {
        return $this->follows()->where('followed_id', $user_id)->exists();
    }

    public function getIconUrl()
    {
        // アイコン画像が登録されていない場合は、デフォルト画像を表示
        if (empty($this->icon_image)) {
            return asset('images/icon1.png');
        }

        // 画像がある場合はそのURLを返す
        return asset('images/' . $this->icon_image);
    }
}
