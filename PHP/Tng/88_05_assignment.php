<?php

// 1. 자신의 사원 정보를 employees 테이블에 등록해주세요.
// 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해주세요.
// 3. 자신의 정보를 출력해 주세요.
// 4. 자신의 정보를 삭제해 주세요.
// 5. PDO 클래스 사용법 숙지

require_once("../Ex/04_107_fnc_db_connect");
$conn = null;

my_db_conn($conn);

// INSERT INTO employees (
// 	emp_no
// 	,birth_date
// 	,first_name
// 	,last_name
// 	,gender
// 	,hire_date
// 	,sup_no)
// VALUES(
// 	500001
// 	,1999-05-21
// 	,'Hwiya'
// 	,'Kang'
// 	,2023-09-18
// 	,NULL);