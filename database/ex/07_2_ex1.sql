SELECT DATE_ADD(NOW(),INTERVAL 1 YEAR);

-- 1. 데이터 타입 변환 함수

SELECT CAST(1234 AS CHAR(4));
SELECT CONVERT(1234, CHAR(4));

-- 2. 제어 흐름 함수
-- IF(수식, 참일 때, 거짓일 때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT IF(0 = 1, '참', '뭔소리야');

SELECT e.emp_no, IF(e.gender = 'M', '남자', '여자')
FROM employees e;

-- IFNULL(수식1, 수식2) : 수식1이 NULL이면 수식2를 반환하고, NULL이 아니면 수식1를 반환
-- 
SELECT IFNULL(NULL, '수식2');

SELECT emp_no
	,title
	,IFNULL(to_date, DATE(NOW())) AS TO_date
FROM titles
ORDER BY emp_no DESC;


-- NULLIF(수식1, 수식2) : 수식1과 2가 같으면 NULL을 반환하고,
-- 							다르면 수식1을 반환합니다.
SELECT NULLIF(1,1);
SELECT NULLIF(1,2);