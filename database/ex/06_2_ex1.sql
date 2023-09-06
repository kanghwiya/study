-- SELECT [컬럼명] FROM [테이블명];
SELECT * FROM dept_emp;

SELECT emp_no, title FROM titles;

SELECT * from employees WHERE first_name = 'Mary';
SELECT * FROM employees WHERE birth_date >= 19600101;
members
SELECT * 
FROM employees
WHERE birth_date >= 19600101
  AND birth_date >= 19650101;
  
SELECT *
FROM employees
WHERE first_name = 'mary'
   or last_name = 'piazza';

SELECT *
FROM employees
WHERE emp_no BETWEEN 10005 AND 10010;

SELECT *
FROM employees
WHERE emp_no = 10005 or emp_no = 10010;

SELECT *
FROM employees
WHERE first_name LIKE('Ge%');

SELECT *
FROM titles
WHERE title in ('staff');

SELECT *
FROM titles
WHERE title like ('%staff%');

-- order by로 정렬하여 조회
SELECT * FROM employees ORDER BY birth_date DESC;

SELECT * FROM employees ORDER BY birth_date, FIRST_name;

SELECT * FROM employees ORDER BY last_name DESC, first_name, birth_date;

--
SELECT emp_no, salary FROM salaries;
SELECT distinct emp_no, salary FROM salaries;

--

SELECT sum(salary) FROM salaries;
SELECT * FROM salaries WHERE to_date = 99990101;
SELECT SUM(salary) FROM salaries WHERE to_date >= 20230901;

SELECT MAX(salary) FROM salaries WHERE to_date >= 20230901;
SELECT min(salary) FROM salaries WHERE to_date >= 20230901;
SELECT avg(salary) FROM salaries WHERE to_date >= 20230901;

SELECT COUNT(emp_no) FROM employees;

SELECT COUNT(*) FROM employees where first_name = 'mary';
-- count에는 컬럼명을 입력


SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901
GROUP BY title HAVING title LIKE('%staff%');

-- "AS"를 주고 싶은 "column 뒤"에

SELECT title, COUNT(title) AS cnt
FROM titles
WHERE to_date >= 20230901
GROUP BY title HAVING title LIKE('%staff%');

-- concat() : 문자열을 합쳐주는 함수
SELECT CONCAT(first_name, ' ', last_name) AS name
FROM employees;

-- 여자사원의 사번, 생일, 풀네임을 오름차순으로 출력해주세요
SELECT CONCAT(emp_no, ' ', birth_date,  ' ', first_name, ' ', last_name)
FROM employees
WHERE gender ='F'
ORDER BY first_name, last_name;

SELECT *
FROM employees
ORDER BY emp_no
LIMIT 10 OFFSET 10;

-- 재직 중인 사원들 중 급여가 상위 5위까지 출력

SELECT *
FROM salaries
WHERE to_date >= 20230901
ORDER BY salary desc
LIMIT 5;

-- 서브쿼리(subquery) : 쿼리 안에 또 다른 쿼리가 있는 형태

-- d002 부서의 현재 매니저의 이름을 가져오고 싶다.
SELECT *
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM dept_manager
	WHERE to_date >= 20230901
		AND dept_no = 'd002'
);

-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 출력해주세요.

SELECT emp_no,
	CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM salaries
	WHERE to_date >= 20230901
	ORDER BY salary 
	LIMIT 1
)

-- 서브쿼리의 결과가 복수일 대 사용방법


SELECT
	emp_no
	, CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE emp_no in (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001'
	);
	
-- 현재 직책이 senior engineer인 사원의 사번과 생일을 출력해주세요.
SELECT
	emp_no
	, birth_date
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	FROM titles
	WHERE title = 'senior engineer' 
		AND to_date >= 20230901 
);

-- 다중열 서브쿼리

SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
	SELECT dept_no, emp_no
	FROM dept_manager
	WHERE to_date >= NOW()
);

-- select 절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재 급여를 받기 시작한 일자, 풀네임 출력해주세요

SELECT
	salary
	, sal.from_date
	, (
		SELECT CONCAT(emp.first_name, ' ', emp.last_name)
		FROM employees AS emp
		WHERE sal.emp_no = emp.emp_no
	) AS full_name
FROM salaries AS sal
WHERE sal.to_date >= NOW();

-- from 절에 오는 서브쿼리

SELECT emp.*
FROM (
	SELECT *
	FROM employees
	WHERE gender = 'M'
) AS emp;

-- mariadb 설치 : windows powershell
-- csalariesd + 경로 복붙

