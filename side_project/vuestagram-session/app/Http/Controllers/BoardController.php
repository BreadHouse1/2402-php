<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index() {
        $boardData = Board::select('boards.*', 'users.name')
                            ->join('users', 'users.id', '=','boards.user_id')
                            ->orderBy('id', 'DESC')
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
}
