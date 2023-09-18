<?php

require_once("./04_107_fnc_db_connect.php");
$conn = null; //오브젝트타입임. 문자열이면 ""로 세팅, 숫자열이면 0으로 세팅 가능.

try {
	echo "트라이";

my_db_conn($conn);

$sql = " SELEC "
	." 		* "
	." 	FROM "
	."		employees "
	."	WHERE "
	." 		emp_no = :emp_no " 
	;

	$arr_ps = [
		":emp_no" => 10004
	];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();
// print_r($result);
}
catch ( Exception $e ){
	echo "캐치";
}
finally {
	db_destroy_conn($conn);
	echo "파이널리";
}

$conn = null;

