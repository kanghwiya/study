SELECT * FROM titles;

SELECT * FROM salaries WHERE salary <= 60000;

SELECT distinct emp_no FROM salaries WHERE salary BETWEEN 60000 AND 70000;

SELECT * FROM employees WHERE emp_no IN (10001, 10005);

SELECT emp_no, title FROM titles WHERE title LIKE ('%Engineer%');

SELECT first_name FROM employees ORDER BY first_name ASC;

SELECT emp_no, AVG(salary) FROM salaries GROUP BY emp_no;

SELECT emp_no, AVG(salary) AS avg_sal
FROM salariesemployees
	GROUP BY emp_no
	HAVING avg_sal >= 30000 AND avg_sal <= 50000;

SELECT emp.emp_no, emp.first_name, emp.last_name, emp.gender
FROM employees AS emp
	WHERE emp_no IN (SELECT sal.emp_no FROM salaries as sal GROUP BY sal.emp_no HAVING AVG(sal.salary) >= 70000);

SELECT emp.emp_no, emp.last_name
FROM employees AS emp
WHERE emp_no IN (SELECT tit.emp_no FROM titles as tit WHERE tit.title = 'Senior Engineer'
AND tit.to_date >= NOW());