<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account',
        'name',
        'password',
        'gender',
        'profile',
        'refresh_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'refresh_token',
    ];

    // json으로 넘겨받은 날짜 값을 Y-m-d H:i:s 식으로 가져옴
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
    
    // Accessor 이름이 정해짐 get + 컬룸명 + Attribute
    // Accessor는 get같이 가져오는 작업을 할때 변형해서 가져오고 싶을 때 사용됨
    // 사용하지 않아도 됨
    public function getGenderAttribute($value) {
        return $value === '0' ? '남자' : '여자';
    }

    public function boards() {
        return $this->hasMany(Board::class);
    }
}
