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

    // ユーザーのアイコンパスを取得する
    public function getIconUrl()
    {
        // 画像が登録されていれば storageから、なければデフォルト画像を返す
        if ($this->icon_image) {
            return asset('storage/' . $this->icon_image);
        }
        return asset('images/icon1.png');
    }
}
