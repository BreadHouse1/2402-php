<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function eduUser() {
        // --------
        // 쿼리 빌더
        // --------
        // $result = DB::select('select * from users');

        // $result = DB::select("SELECT * FROM users WHERE name = :name"
        // , ['name' => '갑돌이']);

        // where 에 ?문법을 쓴 코드
        // $result = DB::select("SELECT * FROM users WHERE name = ? or name =?"
        // , ['갑돌이', '갑순이']);

        // 탈퇴한 회원의 정보를 찾아주세요.
        // $result = DB::select("SELECT * FROM users WHERE deleted_at <= NOW()");
        // $result = DB::select("SELECT * FROM users WHERE deleted_at is not null");

        // insert
        // $sql = 'INSERT INTO users(name, email, password) VALUES(?, ?, ?)';
        // $data =['김철수', 'admin5@admin.com', Hash::make('qwer1234!')];
        // DB::beginTransaction(); // 트랙잭션 시작
        // $result = DB::insert($sql, $data); // boolean으로 결과가 나옴
        // if(!$result) {
        //     DB::rollBack(); // 롤백
        // } else {
        //     DB::commit(); // 커밋
        // }

        // update
        // $sql = 'UPDATE users SET deleted_at = null where id = ?';
        // $data = [5];

        // $result = DB::update($sql, $data);

        // delete
        // $sql = 'DELETE FROM users WHERE id = ?';
        // $data = [7];

        // $result = DB::delete($sql, $data);

        // ---------------
        // 쿼리 빌더 체이닝
        // ---------------
        // users 테이블 모든 데이터 조회
        // select * from users; 와 같음
        // $result = DB::table('users')->get();

        // select * from users where name = ?; ['홍길동']과 같음
        // $result = DB::table('users')->where('name', '=', '홍길동')->get();

        // select * from users where id = ? or id= ?; [3, 4];
        // where에서 =은 생략가능
        // $result = DB::table('users')->where('id', 3)->orWhere('id', 4)->get();

        // select * from users where name = ? and id = ?; ['홍길동', 3]
        // $result = DB::table('users')->where('name', '홍길동')->where('id', 3)->get();

        // select name from users order by name ASC;
        // orderBy 쓸때 asc가 디폴트라 생략가능
        $result = DB::table('users')->select('name')->orderBy('name', 'asc')->get();
        return var_dump($result);
    }
}
