SELECT * FROM boards;

o.o??;

-- 1.직책 테이블의 모든 정보를 조회해주세요.
SELECT * FROM dept_emp;

-- 2. 급여가 60,000 이하인 사원의 사번을 조회해 주세요.

SELECT 
	emp_no
FROM
	salaries
WHERE to_date >= NOW();
	AND salary <= 60000;

-- 3. 급여가 60,000에서 70,000인 사원의 사번을 조회해 주세요.

SELECT
	emp_no
FROM
	salaries
WHERE salary >= 60000
	AND salary <= 70000
GROUP BY emp_no;

-- 4. 사원번호가 10001, 10005인 사원의 모든 정보를 조회해 주세요. 

SELECT *
FROM employees
WHERE emp_no = 10001 OR emp_no = 10005;

SELECT *
FROM employees emp
	JOIN salaries sal
	  ON emp.emp_no = sal.emp_no
	JOIN titles tit
	  ON emp.emp_no = tit.emp_no;
	  
	  

-- 5. 직급명에 "Engineer"가 포함된 사원의 사번과 직급을 조회해 주세요. 

SELECT emp_no, title
FROM titles
WHERE title LIKE("%Engineer%");

-- 6. 사원 이름을 오름차순으로 정렬해서 조회해 주세요. 

SELECT CONCAT(first_name,' ',last_name)
FROM employees
ORDER BY
first_name ASC
, last_name ASC;

-- 7. 사원별 급여의 평균을 조회해 주세요.

SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no;

-- 8. 사원별 급여의 평균이 30000~50000인, 사원번호와 평균급여를 조회해 주세요.

SELECT emp_no, AVG(salary) AS sal_salary
FROM salaries
WHERE to_date<=NOW()
GROUP BY emp_no
	HAVING sal_salary >= 30000 AND sal_salary <= 50000;

-- 9. 사원별 급여 평균이 70,000이상인, 사원의 사번, 이름, 성, 성별을 조회해 주세요.

SELECT emp.emp_no, emp.first_name, emp.last_name, emp.gender
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE AVG(salary) >= 70000;

-- 10. 현재 직책이 "Senior Engineer"인 사원의 사원번호와 성을 조회해 주세요. 

SELECT emp.emp_no, emp.last_name
FROM employees emp
	INNER JOIN titles tit
				ON emp.emp_no = tit.emp_no
				AND tit.title = "Senior Engineer";