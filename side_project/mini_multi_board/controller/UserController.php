<?php

namespace controller;

use model\UserModel AS UM;
use lib\validation;

class UserController extends ParentsController {
	//로그인 페이지 이동
	protected function loginGet() { 
		return "view/login.php";
	}

	// 로그인 처리
	protected function loginPost() {
		$inputData = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
		];

		// 유효성 체크
		if(!Validation::userChk($inputData)) {
			$this->arrErrorMsg = validation::getArrErrorMsg(); // parentsContoller를 사용하여 에러메세지 출력
			return "view/login.php";
		}

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
	$_SESSION["u_pk"] = $resultUserInfo[0]["id"];
	return "Location: /board/list?b_type=0";
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
	
	// 아이디 중복체크
	protected function idChkGet(){
		$errorFlg = "0";
		$errorMsg = "";
		$inputData = [
			"u_id" => $_GET["u_id"]
		];

		// 유효성 체크
		if(!Validation::userChk($inputData)) {
			$errorFlg = "1";
			$errorMsg = validation::getArrErrorMsg()[0]; // parentsContoller를 사용하여 에러메세지 출력
		}

		// 중복 체크
		$userModel = new UM();
		$result = $userModel->getUserInfo($inputData, false);
		$userModel->destroy();

		if(count($result) > 0) {
			$errorFlg = "1";
			$errorMsg = "중복된 아이디입니다.";
		}

		// response 처리
		$arrTmp = [
			"errflg" => $errorFlg
			,"msg" => $errorMsg
		];
		$response = json_encode($arrTmp);

		header('Content-type: application/json');
		echo $response;
		exit();
		}


	// 회원가입 처리
	protected function registPost() {
		$inputData = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $_POST["u_pw"]
			,"u_name" => $_POST["u_name"]
			,"u_pw_chk" => $_POST["u_pw_chk"]
		];

		$arrAddUserInfo = [
			"u_id" => $_POST["u_id"]
			,"u_pw" => $this->encryptionPassword($_POST["u_pw"])
			,"u_name" => $_POST["u_name"]
		];

		// TODO : 발리데이션 체크

		// 유효성 체크
		if(!Validation::userChk($inputData)) {
			$this->arrErrorMsg = validation::getArrErrorMsg(); // parentsContoller를 사용하여 에러메세지 출력
			return "view/regist.php";
		}

		// 유효성 체크 성공시 인서트 처리
		$userModel = new UM();
		$userModel->beginTransaction();
		$result = $userModel->addUserInfo($arrAddUserInfo);

		if($result !== true) {
			$userModel->rollBack();
		} else {
			$userModel->commit();
		}
		$userModel->destroy();

		return "Location: /user/login";
	}

	// 비밀번호 암호화
	private function encryptionPassword($pw) {
		return base64_encode($pw);
	}

}

