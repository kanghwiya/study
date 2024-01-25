<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Token;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Exceptions\MyDBException;
use App\Http\Utils\TokenUtil;


class AuthController extends Controller
{
    // DB에러
    // System 에러
    // 토큰 에러
    // 정보획득 에러

    protected $tokenDI;

    public function __construct(TokenUtil $tokenUtil) {
        $this->tokenDI = $tokenUtil;
    }

    /**
     * 로그인처리
     * 
     * @param Illuminate\Http\Request $request 리퀘스트 객체 여기에 설명 넣기
     * @return string json 엑세스토큰, 쿠키httponly 리플래쉬 토큰
     */
    public function login(Request $request) {
        // throw new MyDBException('E80');
        // DB 유저 정보 획득
        $userInfo = User::where('u_id', $request->u_id)
                    ->where('u_pw', $request->u_pw)
                    ->first();
        // 유저정보 NULL 확인
        if(is_null($userInfo)) {
            throw new Exception('E20');
        }
        // 토큰 생성
        list($accessToken, $refreshToken) = $this->tokenDI->createTokens($userInfo);

        // 리프래쉬 토큰 저장
        $this->tokenDI->upsertRefreshToken($refreshToken);
        // 리턴
        return response()->json([
            'access_token' => $accessToken
        ], 200)->cookie('refresh_token', $refreshToken, env('TOKEN_EXP_REFRESH'));
    }
        


    /**
     * 액세스 토큰 재발급
     * 
     * @param Illuminate\Http\Request $request 리퀘스트 객체 여기에 설명 넣기
     * @return string json 엑세스토큰, 쿠키httponly 리플래쉬 토큰
     */
    public function reisstoken(Request $request) {
        // refresh 토큰 획득
        $cookierefreshToken = $request->cookie('refresh_token');
        // refresh 토큰 체크
        $this->tokenDI->chkToken($cookierefreshToken);
        // 페이로드에서 u_pk 획득
        $u_pk = $this->tokenDI->getPayloadValueToKey($cookierefreshToken, 'upk');
        // 유저 정보 획득
        $userInfo = user::where('u_pk', $u_pk)->first();
        // 유저 정보 획득 체크
        if(is_null($userInfo)) {
            throw new Exception('E20');
        }
        // DB에 저장된 refresh 토큰 검색
        $tokenInfo = Token::select('t_rt', 't_ext')
                            ->where('u_pk', $u_pk)
                            ->first();
        // 토큰 정보 획득 체크
        if(is_null($tokenInfo)) {
            throw new Exception('E04');
        }
        // 토큰 유효기간 체크
        if(strtotime($tokenInfo->t_ext) < time()) {
            throw new Exception('E02');
        }
        // 토큰 일치 체크
        if($cookierefreshToken !== $tokenInfo->t_rt) {
            throw new Exception('E03');
        }
        // 토큰을 새로 작성
        list($accessToken, $refreshToken) = $this->tokenDI->createTokens($userInfo);
        // 리플래쉬 토큰 저장
        $this->tokenDI->upsertRefreshToken($refreshToken);
        // 리턴
        return response()->json([
            'access_token' => $accessToken
        ], 200)->cookie('refresh_token', $refreshToken, env('TOKEN_EXP_REFRESH'));
    }
}