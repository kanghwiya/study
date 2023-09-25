<?php

function my_db_conn( &$conn ){
	$db_host = "localhost"; //host
	$db_user = "root"; //user
	$db_pw = "php504"; //password
	$db_name = "mini_board"; // DB name
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
	return true;
} catch ( Exception $e ) {
		$conn = null; //DB 파기
		return false;
	}
	
}

function db_select( &$conn, &$arr_param ){
$sql = " SELECT "
."		id "
."		,title "
."		,content " 
."	FROM "
."		test "
."	ORDER BY "
."		id DESC "
."	LIMIT :list_cnt OFFSET :offset";

$arr_ps = [
	":list_cnt" => $list_cnt
	,":offset" => $off_set
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();
return $result;

}

function db_cnt( $conn ){
$sql = " SELECT "
."		COUNT(id) as cnt"
." FROM "
."		test";

$stmt = $conn->prepare($sql);
$result = $stmt->fetchAll();
return (int)$result[0]["cnt"];
}