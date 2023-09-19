<?php

// 0. employees 파일에 넣기
// INSERT INTO employees
// VALUES (
// 	700000
// 	,20000101
// 	,'first'
// 	,'last'
// 	,'M'
// 	,20230919
// 	,NULL
// );
// COMMIT;

// 1. titles 테이블에 데이터가 없는 사원을 검색

require_once ("../Ex/04_107_fnc_db_connect.php");

$conn = null;
my_db_conn( $conn );

// 1. titles 테이블에 데이터가 없는 사원을 검색
$sql = " SELECT emp.* "
."		FROM "
."			employees AS emp "
."		LEFT OUTER JOIN "
."			titles AS tit "
."		ON "
."			emp.emp_no = tit.emp_no "
."		WHERE "
."			tit.emp_no IS NULL ";

$arr_ps = [];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();
var_dump($result);
// title에 없는 사원 출력 완료

foreach ($result as $items){
	$items["emp_no"];
}

// 2. [1]번에 해당하는 사원의 직책 정보를 insert
// 		2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
$conn = null;
my_db_conn( $conn );

$SQL = " INSERT INTO "
."				titles "
."		VALUES( "
."				:emp_no "
."				,:title "
."				,now() "
."				,:to_date "
."				) ";

$arr_ps2 = [
	":emp_no" => $items
	,":title" => "Green"
	,":to_date" => 99990101
];

$stmt2 = $conn->prepare($SQL);
$stmt2->execute($arr_ps2);
$result2 = $stmt2->fetchAll();
$conn -> commit();

$conn = null;

// 3. DB에 저장 될 것.

