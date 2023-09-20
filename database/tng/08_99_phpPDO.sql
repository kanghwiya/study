SELECT sal.salary
		,emp.emp_no
		,emp.birth_date
FROM employees emp
INNER JOIN salaries sal
		 ON emp.emp_no = sal.emp_no
WHERE sal.to_date >= NOW()
and sal.emp_no IN(10001,10002);



SELECT sal.salary
		,emp.emp_no
		,emp.birth_date
FROM employees emp
INNER JOIN salaries sal
		 ON emp.emp_no = sal.emp_no
		and sal.to_date >= NOW()
WHERE sal.emp_no = 10001 OR sal.emp_no = 10002;



SELECT sal.salary
		,emp.emp_no
		,emp.birth_date
FROM employees emp
INNER JOIN salaries sal
		 ON emp.emp_no = sal.emp_no
		and sal.to_date >= NOW()
		AND (sal.emp_no = 10001 
		OR sal.emp_no = 10002);


INSERT INTO departments (
		dept_no
		,dept_name
		)
		VALUES (
		'd010'
		,'php504'
		);


SELECT * FROM employees
WHERE emp_no = 700000;

FLUSH PRIVILEGES;


DELETE FROM departments WHERE dept_no = 'd101'

INSERT INTO employees (
			emp_no
			,birth_date
			,first_name
			,last_name
			,gender
			,hire_date
			,sup_no
)
		VALUES(
			500001
			,19990521
			,'Hwiya'
			,'Kang'
			,'F'
			,20230918
			,NULL
);

DELETE from titles
WHERE emp_no = 700000;

SELECT emp_no, salary
FROM salaries
WHERE to_date >=230919
AND salary >= 100000
ORDER BY emp_no DESC;

INSERT INTO employees
VALUES (
	700001
	,20000101
	,'first'
	,'last'
	,'M'
	,20230919
	,NULL
);
COMMIT;


SELECT emp.*
FROM employees AS emp
LEFT OUTER JOIN titles AS tit
		ON emp.emp_no = tit.emp_no
WHERE tit.emp_no IS NULL;

SELECT emp.emp_no
FROM employees emp
WHERE NOT EXISTS (
SELECT 1
FROM titles tit
WHERE emp.emp_no = tit.emp_no);


INSERT INTO titles
VALUES(
700000
,'Staff'
,20230919
,99990101
);