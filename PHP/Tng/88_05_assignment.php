<?php

// 1. 자신의 사원 정보를 employees 테이블에 등록해주세요.


require_once("../Ex/04_107_fnc_db_connect.php");
$conn = null;
my_db_conn($conn);

// $sql = " INSERT INTO employees (emp_no ,birth_date ,first_name ,last_name ,gender ,hire_date)
// VALUES(:emp_no,:birth_date,':first_name','Kang','F', 20230918) ";


// $arr_ps = [
//     ":emp_no" => 500001
//     ,":birth_date" => 19990521
//     ,":first_name" => "Hwiya"
//     ,":Last_name" => "Kang"
//     ,":gender" => "F"
//     ,":hire_date" => 20230918
// ];


// $stmt = $conn->prepare($sql);
// $stmt->execute($arr_ps);
// $result = $stmt->fetchAll();
// print_r($result);



// 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해주세요.

// $SQL =  " UPDATE employees SET
// 	,first_name = ':first_name'
// 	,last_name = ':last_name'
// WHERE emp_no = :emp_no ";

// $arr_ps = [
//     ":first_name" => "메뤼"
//     ,":last_name" => "호이"
//     ,":emp_no" => 500001
// ];

// $stmt = $conn->prepare($SQL);
// $stmt->execute($arr_ps);
// $result = $stmt->fetchAll();
// print_r($result);



// 3. 자신의 정보를 출력해 주세요.

$sql_view =  " SELECT *  "
."   FROM employees "
."  WHERE emp_no = :emp_no ";

$arr_ps = [
    ":emp_no" => 500001
];

$stmt = $conn->prepare($sql_view);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();
print_r($result);

// 4. 자신의 정보를 삭제해 주세요.

$SQL_delete =  " DELETE from  "
."   employees "
."   WHERE emp_no = :emp_no ";

$arr_ps = [
    ":emp_no" => 500001
];

$stmt = $conn->prepare($SQL_delete);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();
print_r($result);

// 5. PDO 클래스 사용법 숙지

