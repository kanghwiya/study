<?php

namespace controller;

use model\UserModel AS UM;

class UserController extends ParentsController {
	//로그인 페이지 이동
	protected function loginGet() { 
		return "view/login.php";
	}

	// 로그인 처리
	protected function loginPost() {
		// 유저의 ID, PW 설정
		$arrInput = [];
		$arrInput["u_id"] = $_POST["u_id"];
		$arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);
		
		// 모델 인스턴스
		$modelUser = new UM();
		$resultUserInfo = $modelUser->getUserInfo($arrInput, true);

		// 유저 유무 체크
		if(count($resultUserInfo) === 0 ){
			$this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해주세요.";
			// 로그인 페이지로 리턴
			return "view/login.php";
		}
	// 세션에 u_id 저장
	$_SESSION["u_id"] = $resultUserInfo[0]["u_id"];
	return "Location: /board/list";
	}
	
	// 로그아웃 처리
	protected function logoutGet() {
		session_unset();
		session_destroy ();
		// 로그인 페이지 리턴
		return "Location: /user/login";
	}

	//회원가입 페이지 이동
	protected function registGet() { 
		return "view/regist"._EXTENTION_PHP;
	}

	// 비밀번호 암호화
	private function encryptionPassword($pw) {
		return base64_encode($pw);
	}


}

