-- 1. 사원 정보테이블에 각자의 정보를 적절하게 넣어주세요.

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
	VALUES (
	(SELECT MAX(emp_no) + 1 FROM employees emp)
	,19990521
	,'Hwiya'
	,'Kang'
	,'F'
	,20230907
);

-- 2. 월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500001
	,2000000
	,20230907
	,20230907
)

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500001
	,'CEO'
	,20230907
	,99990909
)

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d009'
	,20230907
	,99990909
)

-- 3. 짝꿍의 [1,2]것도 넣어주세요.

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
	VALUES (
	500002
	,19930624
	,'Hyunhee'
	,'Choi'
	,'F'
	,20230907
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,1000000
	,20230907
	,20230907
)

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'CEO'
	,20230907
	,99990909
)

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d009'
	,20230907
	,99990909
)

-- 4. 나와 짝꿍의 소속 부서를 d009로 변경해주세요.

UPDATE dept_emp
SET to_date = NOW()
WHERE emp_no = 500001 AND dept_no = 'd001';

INSERT INTO dept_emp(
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d009'
	,NOW()
	,99990909
);



-- 5. 짝궁의 모든 정보를 삭제해 주세요.

DELETE FROM employees
WHERE emp_no = 500002;

DELETE FROM dept_emp
WHERE emp_no = 500002 AND dept_no = ;

DELETE FROM salaries
WHERE emp_no = 500002;

DELETE FROM titles
WHERE emp_no = 500002;

COMMIT;


-- 6. 'd009' 부서의 관리자를 나로 변경해주세요.

UPDATE dept_manager
SET to_date = 20230906
WHERE emp_no = 111939

INSERT INTO dept_manager (
	dept_no
	,emp_no
	,from_date
	,to_date
)
VALUES (
	'd009'
	,500001
	,20230907
	,99990909
)
-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해주세요.

UPDATE titles
SET title = 'Senior Engineer'
WHERE emp_no = 500001;

UPDATE titles
SET from_date = 20230907
WHERE emp_no = 500001;


-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해주세요.

SELECT emp.emp_no, concat(emp.first_name, ' ', emp.last_name)
	FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE sal.emp_no = 
		(SELECT emp_no
			FROM salaries
			ORDER BY salary DESC
			LIMIT 1)
	or sal.emp_no = 
		(SELECT emp_no
			FROM salaries
			ORDER BY salary ASC 
			LIMIT 1)
;

SELECT emp.emp_no, concat(emp.first_name, ' ', emp.last_name)
	FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
	AND (sal.emp_no = 
		(SELECT emp_no
			FROM salaries
			ORDER BY salary DESC
			LIMIT 1)
	or sal.emp_no = 
		(SELECT emp_no
			FROM salaries
			ORDER BY salary ASC 
			LIMIT 1)
);

SELECT emp.emp_no, concat(emp.first_name, ' ', emp.last_name)
	FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE sal.salary = 
		(SELECT MAX(salary)
		FROM salaries)
	or sal.salary = 
		(SELECT MIN(salary)
		FROM salaries)
;

CREATE INDEX idx_test ON salaries(salary);

-- 9. 전체 사원의 평균 연봉을 출력해주세요.
SELECT AVG(salary)
	FROM salaries 
;

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해주세요.
SELECT emp_no, AVG(salary)
	FROM salaries 
WHERE emp_no = 499975;