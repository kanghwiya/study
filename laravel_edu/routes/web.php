<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// -----------------------
// 라우트 정의
// -----------------------
// 문자열을 리턴 클로저라고 부름
Route::get('/hi', function () {
    return '안녕하세요.';
});


// 없는 뷰파일을 리턴할 때
Route::get('/myview', function (){ //'/myview'는 url
    return view('myview'); //뷰파일에 있는 myview 호출
});

// -----------------------
// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의 된 것이 실행
// -----------------------
// get메소드 localhost/home으로 접속했을 때 home라는 뷰파일을 리턴해주세요.
// (GET)으로 받아온 경우임
Route::get('/home', function () {
    return view('home');
});

Route::post('/home', function () {
    return '메소드 포스트로 문자열을 리턴했습니다.';
});

// get, post, put/fetch(똑같은 처리를 함. 제어는 보통 put으로 함. 같이 쓰는 경우도 있음), delete
Route::put('/home', function() {
    return 'method : put';
});
// form에 @method('PUT')를 추가해줘야함.

Route::delete('/home', function() {
    return '이게 딜리트랍니다';
});

// ----------------------
// 라우트에서 파라미터 제어
// ----------------------
// 쿼리 스트링에 파라미터가 세팅돼서 요청이 올 때 파라미터 획득
Route::get('/query', function(Request $request) {
    return $request->id.", ".$request->name;
});

// URL 세그먼트로 지정 파라미터 획득 (function 파라미터와 {} 값 통일)
Route::get('/segment/{id}', function($id) {
    return '세그먼트 파라미터 : '.$id;
});

// 2개 이상의 URL 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}', function($id, $name) {
    return '세그먼트 파라미터 2개 이상 : '.$id.', '.$name;
});

// 가능함. 그런데 필요없는 정보도 받아올 가능성이 있음
Route::get('/segment2/{id}/{name}', function(Request $request) {
    return '세그먼트 파라미터 2개 이상 : '.$request->id.", ".$request->name;
});

// URL 세그먼트로 지정 파라미터 획득 : 기본값 설정
Route::get('/segment3/{id?}', function ($id = 'base') {
    return 'segment3 : '.$id;
});

// ----------------------
// 라우트 매칭 실패시 대체 라우트 정의
// ----------------------
Route::fallback(function () {
    return '잘못된 경로를 입력하셨습니다.';
});

// ----------------------
// 라우트의 이름 지정
// ----------------------
Route::get('/name', function() {
    return view('name');
});

Route::get('/name/home/php504/root', function() {
    return '이름없는 라우트';
});

Route::get('/name/home/php504/user', function() {
    return '이름있는 라우트';
})->name('name.user'); // '.'이 기능을 구분해줌

// --------------
// 컨트롤러
// --------------
// 커멘드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
use App\Http\Controllers\TestController;
Route::get('/test', [TestController::class, 'index'])->name('test.index');

// php artisan make:controller 컨트롤러명 --resource
use App\Http\Controllers\TaskController;
Route::resource('/task', TaskController::class);