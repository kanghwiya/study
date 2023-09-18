<?php

$db_host = "localhoset"; //host
// 127.0.0.1 === localhost
$db_user = "root"; //user
$db_pw = "php504"; //password
$db_name = "employees"; // DB name
$db_charset = "utf8mb4"; //charset
$db_dns = "mysql:host =" .$db_host.";dbname=".$db_name.";charset".$db_charset;

$db_options = [
	//DB의 Prepared Statement 기능을 사용하도록 설정
	PDO::ATTR_EMULATE_PREPARES			=>false
	//PDO Exception을 Throws하도록 설정
	,PDO::ATTR_ERRMODE					=>PDO::ERRMODE_EXCEPTION
	//연상배열로 Fetch를 하도록 설정
	,PDO::ATTR_DEFAULT_FETCH_MODE		=>PDO::FETCH_ASSOC
];

//PDO Class로 DB 연동
$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);


//SQL 작성
// 10004번 사원테이블의 사원정보를 출력해주세요.
$sql = " SELECT "
	." 		* "
	." 	FROM "
	."		employees "
	."	WHERE "
	." 		emp_no = :emp_no " //?나 :emp_no(임의이름. 마음대로 지어도 됨) 등을 줘서 db가 합쳐서 만들게 함. 이러는 것을 prepared statement라고 함.
	;
	//SQL작성할때 공백 추가

//prepared statement setting
	$arr_ps = [
		":emp_no" => 10004
	];

	//prepared statement 생성
	$stmt = $obj_conn->prepare($sql); //클래스 인스턴스 기능이 들어가 있음.
	$stmt -> execute($arr_ps); // 쿼리 실행
	$result = $stmt->fetchAll(); //쿼리 결과를 fetch 한다.
	print_r($result);

// ------------------------------------------------------
//사번 10001, 10002의 현재 연봉, 사번, 생일을 가져오는 쿼리를 작성해서 출력해주세요.

$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);


$sql = "SELECT"
	.	" sal.salary, emp.emp_no, emp.birth_date "
	." FROM "
	.	" employees AS emp "
	." INNER JOIN "
	.	" salaries AS sal "
		." ON emp.emp_no = sal.emp_no "
	."WHERE"
	.	" sal.to_date >= NOW() "
	.	" and "
	.	" sal.emp_no IN(:no1,:no2) "
	;


	$arr_ps = [
		":no1" => 10001
		,":no2" => 10002
	];

	$stmt = $obj_conn->prepare($sql); //클래스 인스턴스 기능이 들어가 있음.
	$stmt -> execute($arr_ps); // 쿼리 실행
	$result = $stmt->fetchAll(); //쿼리 결과를 fetch 한다.
	print_r($result);



// ------------------------------------------------------
	// insert
	// 부서번호가 'd010', '부서명이 'php504'인 데이터 insert

	$SQL = " INSERT INTO departments ( "
	."		dept_no "
	."		,dept_name "
	."	) "
	."	VALUES ( "
	."		:dept_no "
	."		,:dept_name "
	."	)";

	$arr_ps = [
		":dept_no" => "d010"
		,":dept_name" => "php504"
	];

	$stmt = $obj_conn->prepare($SQL);
	$result = $stmt -> execute($arr_ps);
	$obj_conn->commit();

	var_dump($result);

// ------------------------------------------------------
	// 부서번호가 'd101' 삭제

	$SQL = "DELETE FROM"
	." 			departments "
	." 		WHERE dept_no = :dept_no";

	$arr_ps = [
		":dept_no" => "d010"
	];

	$stmt = $obj_conn->prepare($SQL);
	$result = $stmt -> execute($arr_ps); //실제로 sql을 실행
	$res_cnt = $stmt->rowCount();
	var_dump($res_cnt);
	if($res_cnt >= 2){
		$obj_conn->rollBack(); //롤백
		echo "rollBack";
	}
	else {
		$obj_conn->commit(); //커밋
		echo "commit";
	}



	// if( !$result ) {
	// 	$obj_conn->rollBack();
	// }
	// else {
	// 	$obj_conn->commit();
	// }

		// $obj_conn = null; //DB 파기