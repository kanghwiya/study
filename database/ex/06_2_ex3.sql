-- UPDATE의 기본 구조
-- UPDATE 테이블명
-- SET (컬럼1= = 값1, 컬럼2 = 값2)
-- WHERE 조건
--  ** 추가설명 : 조건을 적지않을 경우 모든 레코드가 수정됩니다.
-- 			실수를 방지하기 위해 WHERE 절을 먼저 작성하고 SET 절을 작성하는 것이 좋습니다.


SHOW VARIABLES LIKE 'autocommit%';

UPDATE titles
SET title = 'Unknown'
WHERE emp_no = 500000;


SELECT * FROM titles WHERE emp_no = 500000;
SELECT * FROM salaries WHERE emp_no = 500000;

-- 500000q번 사원의 직급을 'Staff', 연봉을 '25000'

UPDATE titles
SET title = 'Staff'
WHERE emp_no = 500000;

UPDATE salaries
SET salary = 25000
WHERE emp_no = 500000;

SELECT * FROM titles ORDER BY emp_no DESC;
SELECT * FROM salaries ORDER BY emp_no DESC;