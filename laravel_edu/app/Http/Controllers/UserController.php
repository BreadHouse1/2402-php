<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        // SELECT 문

        // users 테이블 모든 데이터 조회
        // select * from users; 와 같음
        // $result = DB::table('users')->get();

        // select * from users where name = ?; ['홍길동']과 같음
        // $result = DB::table('users')->where('name', '=', '홍길동')->get();
        
        // Where or 사용법
        // select * from users where id = ? or id= ?; [3, 4];
        // where에서 =은 생략가능
        // $result = DB::table('users')->where('id', 3)->orWhere('id', 4)->get();

        // Where and 사용법
        // select * from users where name = ? and id = ?; ['홍길동', 3]
        // $result = DB::table('users')->where('name', '홍길동')->where('id', 3)->get();

        // order by 사용법
        // select name from users order by name ASC;
        // orderBy 쓸때 asc가 디폴트라 생략가능
        // $result = DB::table('users')->select('name')->orderBy('name', 'asc')->get();

        // Where in 사용법
        //  select * from users where id in (?, ?); [2, 5]
        // $result = DB::table('users')
        //             ->whereIn('id', [3, 5])
        //             ->get();

        // deleted_at가 null인 유저 찾기
        // select * from users where deleted_at is null;
        // $result = DB::table('users')
        //             ->whereNull('deleted_at')
        //             ->get();

        // 2023년에 가입한 사람만 출력
        // select * from users where year(created_at) = ?
        // select * from users created_at beetween 20230101000000 and 20231231235959
        // $result = DB::table('users')
        //             ->whereYear('created_at', '2023')
        //             ->get();

        // 성별 회원수 구하기
        // GROUP BY와 HAVEING, COUNT사용
        // select gender, COUNT(gender) from users group by gender
        // db::raw 가 없이 count(gender)를 쓰면 그냥 컬룸이름으로 인식하기 때문에 DB::raw를 사용해야한다
        // $result = DB::table('users')
        //             ->select('gender', DB::raw('COUNT(gender) cnt'))
        //             ->groupBy('gender')
        //             ->having('gender', '=', 'M')
        //             ->get();

        // LIMIT와 OFFSET 사용
        // select id, name from users order by id limit ?;[1]
        // $result = DB::table('users')
        //             ->select('id', 'name')
        //             ->orderBy('id')
        //             ->limit('1')
        //             ->offset('2')
        //             ->get();

        // where 동적 처리 when
        // $query 에는 when의 전까지 쿼리문이 들어있음 (지금은 $result = DB::table('users)가 담겨있음)
        // when 은 빈값이면 처리하지않고 값이 있으면 처리함
        // $reqData = 1; // 유저가 1또는 빈값인 데이터를 전달
        // $result = DB::table('users')
        //             ->when($reqData, function($query, $reqData) {
        //                 $query->where('id', $requData);
        //             })
                    // ->dd();

        
        // INSERT 문
        // $result = db::TABLE('users')->insert([
        //     'name' => '김영희'
        //     ,'email' => 'kim@admin.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F'
        // ]);
        
        // UPDATE 문
        // $result = DB::table('users')
        //             ->where('id', 10)
        //             ->update([
        //     'email' => 'kim@naver.com'
        // ]);

        // DELETE 문
        // $result = DB::table('users')
        //             ->where('id', 10)
        //             ->delete();

        // first() : 쿼리 결과에서 가장 첫번째 레코드만 반환
        // $result = DB::table('users')->first();

        // count() : 쿼리 결과의 레코드 수를 반환
        // $result = DB::table('users')->count();

        // find($id) : 지정된 기본키(pk)의 해당하는 레코드를 반환
        // $result = DB::table('users')->find(5);

        // --------------
        // Eloquent Model
        // --------------
        // $result = User::all(); // Model 객체로 값을 받아옴
        // $result = User::find(3);

        // upsert 사용시 컬룸 사용은 Model->컬룸명(Users)->fillable을 
        // upsert : insert와 update처리

        // insert 처리
        // $data = [
        //     'name' => '김영희'
        //     ,'email' => 'kim@naver.com'
        //     ,'password' => Hash::make('qwer1234!')
        //     ,'gender' => 'F'
        // ];
        // $result = User::create($data);

        // update 처리
        // $target = User::find(13);
        // $target->gender = 'F'; // 이전 정보와 업데이트한 정보를 저장
        // $target->getOriginal(); // original에 담긴 이전 정보를 가져옴
        // $result = $target->save(); // 업데이트한 정보를 저장

        // delete 처리
        // $result = User::destroy(13);

        // softdelete 된 데이터 조회
        // $result = User::withTrashed()->get(); // softdelete 포함해서 가져옴
        // $result = User::onlyTrashed()->get(); // softdelete만 가져옴

        // softdelete 된거 복원
        // $result = User::where('id', 13)->restore(); // deleted_at가 다시 null값이됨 updated_at도 갱신이 됨
        
        
        return var_dump($result);


    }
}
