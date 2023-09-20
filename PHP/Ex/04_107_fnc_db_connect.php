<?php

// -------------------------------------
// 파일명	: 04_107_fnc_db_connect.php
// 기능		: DB 연동 관리 함수
// 버전 	: v001 new kang 230918
//				v002 dbconn 설정변변경 kang 230924
// -------------------------------------


// -------------------------------------
// 함수명	:my_db_conn
// 기능		:DB connect
// 파라미터 : PDO	&$conn
// 리턴		: 없음
// -------------------------------------

function my_db_conn( &$conn ){
	$db_host = "localhoset"; //host
	$db_user = "root"; //user
	$db_pw = "php504"; //password
	$db_name = "employees"; // DB name
	$db_charset = "utf8mb4"; //charset
	$db_dns = "mysql:host =" .$db_host.";dbname=".$db_name.";charset".$db_charset;

try {

$db_options = [
	//DB의 Prepared Statement 기능을 사용하도록 설정
	PDO::ATTR_EMULATE_PREPARES			=>false
	//PDO Exception을 Throws하도록 설정
	,PDO::ATTR_ERRMODE					=>PDO::ERRMODE_EXCEPTION
	//연상배열로 Fetch를 하도록 설정
	,PDO::ATTR_DEFAULT_FETCH_MODE		=>PDO::FETCH_ASSOC
];

$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
	} catch ( Exception $e ) {
		$conn = null;
		return false;
	}
		return true; // finally 적용할 구문이 없기 때문에 제외
	
}

$conn = null;
if ( !my_db_conn($conn)){
	echo "db connect error";
	exit; // 처리를 여기서 끝내겠다.
}
// -------------------------------------
// 함수명	:my_db_conn
// 기능		:DB Destroy
// 파라미터 :PDO	&$conn
// 리턴		:없음
// -------------------------------------

// function db_destroy_conn(&$conn){
// 	$conn = null;
// } //함수 파기