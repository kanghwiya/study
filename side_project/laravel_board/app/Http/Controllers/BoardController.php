<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Board;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // * del 231116 미들웨어로 이관
        // 로그인 체크
        // if(!Auth::check()){
        //     return redirect->route('user.login.get');
        // }

        // 게시글 획득
        $result = Board::get();
        return view('list')->with('data', $result);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // $request에는 $_GET, $_SESSION, $_POST 등에 담긴 모든 내용이 담겨있음
    public function store(Request $request)
    {
        // return var_dump($request->only('b_title', 'b_content'));
        $resultarr = $request->only('b_title', 'b_content');
        $result = board::create($resultarr);
        // $result->save();

        // save를 사용한 경우는 새 객체를 생성함. insert와 update둘 다에서 사용가능.
        //              create는 insert에만 사용가능
        // $model = new Board($resultarr);
        // $model->save();

        // var_dump($result);
        // return redirect('/board');
        return redirect()->route('board.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //게시글 데이터 획득 ('=')은 생략가능
        // $result = DB::table('boards')
        //         ->where('b_id','=',$id)
        //         ->get();
        // Board::where('b_id', $id)->get();
        $result = Board::find($id);

        // 조회수 올리기
        $result->b_hits++; //조회수 1증가
        $result->timestamps = false; //조회수 증가 시 update 시간 변동x

        // 업데이트 처리
        $result->save();
        
        return view('detail')->with('data', $result);
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::debug("-------삭제처리 시작-------");
        try{
            DB::begintransaction();
            Log::debug("트랜잭션 시작");
            Board::destroy($id);
            Log::debug("삭제 완료");
            DB::commit();
            Log::debug("커밋 완료");
        } catch(Exception $e) {
            DB::rollback();
            Log::debug("롤백 완료");
            return redirect()->route('error')->withErrors($e->getmessage());
        }
        Log::debug("-------삭제처리 종료-------");


        return redirect()->route('board.index');
    }
}
