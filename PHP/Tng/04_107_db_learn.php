<?php

// 1. db_conn 이라는 함수를 만들어주세요.
// 		1-1. 기능 : db설정 및 pdo객체 생성

function db_conn( &$conn ){
	$db_host = "localhost";
	$db_user = "root";
	$db_pw = "php504";
	$db_name = "employees";
	$db_charset = "utf8mb4";
	$db_dns = "mysql:host =" .$db_host.";dbname=".$db_name.";charset".$db_charset;

	$db_options = [
		PDO::ATTR_EMULATE_PREPARES			=>false
		,PDO::ATTR_ERRMODE					=>PDO::ERRMODE_EXCEPTION
		,PDO::ATTR_DEFAULT_FETCH_MODE		=>PDO::FETCH_ASSOC
	];

	$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
}

$conn = null;
db_conn( $conn );
// $conn = null; //초기화

// 2. 현재 급여가 80,000이상인 사원을 조회하기

$sql = " SELECT "
."				emp_no "
."				,salary "
."		FROM "
."				salaries "
."		WHERE "
."			to_date >= now() "
."		AND "
."			salary >= :salary ";

$arr_ps = [
	":salary" => 80000
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();
// print_r($result);


// 3. 조회한 데이터를 루프하면서 100,000이상인 사원의 번호를 출력해주세요.
$cnt = 0;
foreach ($result as $value){
	if($value["salary"] >= 100000){
		echo $value["emp_no"],"\n";
		$cnt++;
	}

}
echo $cnt;