<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // type 체크
        $type = 0;
        if($request->has('type')) {
            $type = $request->type;
        }

        // 게시글 조회
        $resultBoardList = Board::where('type', $type)
                                ->orderBy('created_at', 'DESC')
                                ->get();

        // 게시판 이름 조회
        $resultBoardName = BoardName::select('name', 'type')
                                        ->where('type', $type)
                                        ->first();

        return view('boardIndex')
                ->with('data', $resultBoardList)
                ->with('boardNameInfo', $resultBoardName);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 파일 서버에 저장
        $filePath = $request->file('file')->store('img');

        // insert 데이터 작성
        $insertData = $request->only('title', 'content', 'type');
        $insertData['user_id'] = Auth::id(); // Auth::id() 로그인한 유저 id를 가져옴
        $insertData['img'] = "/".$filePath;

        $resultInsert = Board::create($insertData);

        return redirect()->route('board.index', ['type' => $request->type]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 게시글 정보 획득
        $resultBoardInfo = Board::find($id);

        $responseData = $resultBoardInfo->getOriginal();
        $responseData['auth_id'] = Auth::id();

        Log::debug('json', $responseData); // debug(형식,데이터)

        return response()->json($responseData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // destroy() : 해당 pk를 삭제하고 삭제한 행의 값을 반환
        Board::destroy($id);
        $responseData = [
            'errorFlg' => false,
            'deletedId' => $id
        ];
        return response()->json($responseData);
    }
}