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


SELECT * FROM departments;

FLUSH PRIVILEGES;


DELETE FROM departments WHERE dept_no = 'd101'