<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function like($board_id) {
        
        DB::beginTransaction();
        // like 검색
        $likeData = Like::where('user_id', Auth::id())
                            ->where('board_id', $board_id)
                            ->first();
        if(isset($likeData)) {
            $likeData->like_chk = $likeData->like_chk == '0' ? '1' : '0';
        } else {
            $likeData = new Like();
            $likeData->user_id = Auth::id();
            $likeData->board_id = $board_id;
            $likeData->like_chk = '1';
        }
        $likeData->save();

        // boards 갱신
        $boardData = Board::find($board_id);
        if($likeData->like_chk == '1') {
            $boardData->like += 1;
        } else {
            $boardData->like -= 1;
        }
        $boardData->save();
        DB::commit();

        $responseData = [
            'code' => '0'
            ,'msg' => '좋아요 완료'
            ,'data' => $likeData
        ];

        return response()->json($responseData, 200);
    }
}
