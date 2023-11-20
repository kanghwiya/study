<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Item;

class ItemController extends Controller
{
    public function index() {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        $result = Item::orderBy('created_at', 'DESC')->get();
        
        if($result->count() < 1){
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            $responseData['data'] = $result;
        }
        return $responseData;
    }

    // 게시글 작성
    public function store(Request $request) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        $result = Item::create($request->data);
        
        $responseData['data'] = $result;
        return $responseData;

    }

    // 게시글 수정
    public function update(Request $request, $id) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
            ,'data' => []
        ];

        // find는 검색된 결과가 없으면 null로 옴
        $result = Item::find($id);

        if(!$result){
            // $result가 null일 경우 에러 처리
            // 예외처리 : 데이터 0건
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            // 정상 처리
            $result->completed = $request->data['completed'];
            $result->completed_at = $request->data['completed'] === '1' ? Carbon::now() : null;
            $result->save();
            $responseData['data'] = $result;
        }

        return $responseData;
    }

    // 게시글 삭제
    public function destroy($id) {
        $responseData = [
            'code' => '0'
            ,'msg' => ''
        ];

        // find는 검색된 결과가 없으면 null로 옴
        $result = Item::find($id);

        if(!$result){
            // $result가 null일 경우 에러 처리
            // 예외처리 : 데이터 0건
            $responseData['code'] = 'E01';
            $responseData['msg'] = 'No Data.';
        } else {
            // 정상 처리
            $result->delete();
        }

        return $responseData;
    }
}
