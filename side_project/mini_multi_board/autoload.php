<?php

spl_autoload_register( function($path) {
	$path = str_replace("\\", "/", $path); //class는 기본적으로 \로 오며 replace
	// 해주지 않으면 에러날 가능성이 있음.

	require_once($path._EXTENTION_PHP);
}); //객체 지향에서 많이 사용 : 변동되는 값을 자동으로 감지.
// 익명함수 아님. 클로저(closure?)라는 php의 class를 이용