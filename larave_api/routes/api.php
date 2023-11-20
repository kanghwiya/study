<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 라우트 그룹
Route::prefix('/item')
->group( function() {
    Route::get('/', [ItemController::class, 'index']); //item 전체 조회
    Route::post('/', [ItemController::class, 'store']); //item 작성
    Route::put('/{id}', [ItemController::class,'update']); //게시글 수정
    Route::delete('/{id}', [ItemController::class,'destroy']);
});
// 유저가 온 요청에 따라서 하나의 처리만 함. 유저에게 다시 전달만 하기 때문에
// 라우트 네임을 쓸 일이 전혀 없음. 그래서 name을 생성하지 않음.
// api에서 처리하기 때문에 view가 없음. 그래서 불러올 필요가 x