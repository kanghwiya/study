<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Exceptions\MyDBException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // 에러메세지 불러와서 처리
    public function render($request, Throwable $exception) {

        $errMsgList = $this->context();
        
        if($exception instanceof MyDBException) {
            $errMsgList = $exception->context();
        }
        
        $errCode = array_key_exists($exception->getMessage(), $errMsgList) ? $exception->getMessage() : 'E99';
        return response()->json([
            'code' => $errCode
            , 'msg' => $errMsgList[$errCode]['msg']
        ], $errMsgList[$errCode]['status']);

        
    }

    /** 처리할 때 필요한 메세지 저장(return만 있음) DB에러
     * 
     * @return Array 에러메세지 배열
     * */ 
    public function context() {
        return [
            'E01' => ['status' => 401, 'msg' => '토큰 없음']
            ,'E02' => ['status' => 402, 'msg' => '토큰 만료']
            ,'E03' => ['status' => 401, 'msg' => '토큰 이상']
            ,'E04' => ['status' => 401, 'msg' => '발급 한 적 없는 토큰']
            ,'E05' => ['status' => 500, 'msg' => '페이로드 이상']
            ,'E20' => ['status' => 401, 'msg' => '유저없음']
            ,'E99' => ['status' => 500, 'msg' => '시스템에러']
        ];
    }
}
