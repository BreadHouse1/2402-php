<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    // 해당 모델에 소프트딜리트를 적용시키고 싶으면 SoftDeletes 트레이트 추가
    use HasApiTokens, HasFactory, Notifiable, softDeletes;

    // 모델과 이어질 테이블 명을 정의하는 프로퍼티
    protected $table = 'users';

    // PK를 지정하는 프로퍼티
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     * 
     */

    // upsert시 허용할 컬럼들을 설정하는 프로퍼티, 화이트 리스트 :작성(사용)시 허용
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender'
    ];

    // upsert시 비허용할 컬럼들을 설정하는 프로퍼티, 블랙 리스트 :작성(사용)시 비허용
    // protected $guarded = [
    //     'id'
    // ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];
}
