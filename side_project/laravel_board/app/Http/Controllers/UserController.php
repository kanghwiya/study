<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class UserController extends Controller
{
    public function loginget(){
        // 로그인 한 유저는 보드 리스트로 이동
        if(Auth::check()) {
            return redirect()->route('board.index');
        }

        return view('login');
    }
    public function loginpost(Request $request){
        // 유효성 검사
        $validator = Validator::make(
            // validator에 make라는 메소드가 있다.. 
            $request->only('email', 'password')
            ,[
                'email' => 'required|email|max:50'
                ,'password' => 'required'
            ]
        );

        // 유효성 검사 실패시 처리
        if($validator->fails()){
            return view('login')->withErrors($validator->errors());
        }

        // 유저 정보 습득
        $result = User::where('email', $request->email)->first();
        if(!$result || !(Hash::check($request->password, $result->password))) {
            $errorMsg = '아이디와 비밀번호를 확인해주세요';
            return redirect()->route('user.login.get')->withErrors($errorMsg);
        }

        // 유저 인증작업
        Auth::login($result);
        if(Auth::check()) {
            session($result->only('id'));
        } else {
            $errorMsg = "인증 에러가 발생했습니다.";
            return view('login')->withErrors($errorMsg);
        }
        // location처리 같은 개념임
        return redirect()->route('board.index');

    }
    public function registrationget(){
        return view('registration');
    }
    public function registrationpost(Request $request){

        // 유효성 검사
        $validator = Validator::make(
            // validator에 make라는 메소드가 있다.. 
            $request->only('email', 'password', 'passwordchk', 'name')
            ,[
                // 정규식을 적거나 라라벨을 이용해서 해도 됨. 이건 라라벨에서 제공하는 것을 사용
                // 필수|이메일형식확인|최대글자수50
                'email' => 'required|email|max:50'
                ,'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
                ,'password' => 'same:passwordchk'
            ]
        );
        
        // 에러 확인하는 var_dump
        // var_dump($validator->errors());

        // 유효성 검사 실패시 처리
        if($validator->fails()){
            return view('registration')->withErrors($validator->errors());
        }


        // 데이터 베이스에 저장할 데이터 획득(하지 않을 경우 선별되지 않은 대량의 데이터를... 눈으로..확인가능)
        $data = $request->only('email', 'password', 'name');

        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);
        
        // 받아온 회원 정보를 DB에 저장 (엘로퀀트)
        $result = User::create($data);
        
        return redirect()->route('user.login.get');
    }

    public function logoutget() {
        Session::flush(); //세션 파기
        Auth::logout(); //로그아웃
        return redirect()->route('user.login.get');
    }
}