<?php

namespace controller;

class ParentsController {
	protected $controllerChkUrl; // 헤더 표시 제어용 문자열
	protected $arrErrorMsg = []; // 화면에 표시할 에러메세지 리스트
	// 비로그인 시 접속 불가능한 URL 리스트
	private $arrNeedAuthPage = [
		"board/list"
	];

	public function __construct($action){
		// 뷰view 관련 체크 접속 url 세팅
		$this->controllerChkUrl = $_GET["url"];

		// 세션 시작 : 웹서버에 저장
		if(!isset($_SESSION)) {
			session_start();
		}

		// 유저 로그인 및 권한 체크
		$this->chkAuthorization();


		// controller 메소드 호출
		$resultAction = $this->$action();

		// view 호출
		$this->callView($resultAction);
		exit();
	}
	// 유저 권한 체크용 메소드
	private function chkAuthorization() {
		$url = $_GET["url"];
		if( !isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuthPage)){
			header("Location: /user/login");
			exit();
		}

	}

	// 뷰 호출용 메소드
	private function callView($path) {
		//  view/list.php :url이 안바뀜
		//  Location: /board/list : 이동도 하고 url도 바뀜
		if( strpos($path, "Location:") === 0 ) {
			header($path);
			exit();
		} else {
			require_once($path);
		}
	}
}