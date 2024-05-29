<?php

namespace App\Http\Controllers;

use App\Exceptions\MyValidateException;
use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BoardController extends Controller
{
    public function index() {
        // 로그인한 회원정보
        // $user = Auth::user();

        $boardData = Board::select('boards.*', 'users.name')
                            ->join('users', 'users.id', '=','boards.user_id')
                            ->orderBy('id', 'DESC')
                            // ->where('boards.user_id', '=', $user->id) // 로그인한 회원의 게시물만 가져오고 싶을때
                            ->limit(20)
                            ->get();
        
        $responseData = [
            'code' => '0'
            ,'msg' => '게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];

        return response()->json($responseData, 200);
    }

    public function moreIndex($id) {
        $boardData = Board::select('boards.*', 'users.name')
        ->join('users', 'boards.user_id', '=', 'users.id')
        ->orderBy('boards.id', 'desc')
        ->where('boards.id', '<', $id)
        ->limit(20)
        ->get();

        $responseData = [
            'code' => '0'
            ,'msg' => '추가 게시글 획득 완료'
            ,'data' => $boardData->toArray()
        ];

        return response()->json($responseData, 200);
    }
    
    // 글 작성 처리
    public function createBoard(Request $request) {
        $user = Auth::user();
        $request['user_id'] = $user->id;
        
        $requestData = $request->all();

        // 유효성 검사
        $validator = Validator::make(
            $requestData
            ,[
                'user_id' => ['required', 'regex:/^[0-9]+$/']
                ,'content' => ['required', 'max:200']
                ,'img' => ['required', 'image']
            ]
        );

        // 유효성 검사 체크
        if($validator->fails()) {
            Log::debug('유효성 검사 실패', $validator->errors()->toArray());
            throw new MyValidateException('E01');
        }

        // 작성 데이터 생성
        $insertData = $request->all();

        $insertData['user_id'] = $user->id;

        // 파일 저장
        $insertData['img'] = $request->file('img')->store('img');

        // 인서트 처리
        $boardData = Board::create($insertData);

        $responseData = [
            'code' => '0'
            ,'msg' => '글 작성 완료'
            ,'data' => $boardData
        ];

        return response()->json($responseData, 200);
    }

    public function delete($id) {
        
        Board::destroy($id);

        $responseData = [
            'code' => '0'
            ,'msg' => '글 삭제 완료'
            ,'data' => $id
        ];

        return response()->json($responseData);
    }
}
