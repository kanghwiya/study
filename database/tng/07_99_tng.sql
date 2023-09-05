-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해주세요.

SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name), tit.title
	FROM employees emp
		INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no
;
	
	
-- 2. 사원의 사원번호, 성별, 현재 월급을 출력

SELECT emp.emp_no, emp.gender, sal.salary
	FROM employees emp
		INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		and to_date >= NOW()
;

-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력

SELECT CONCAT(emp.first_name, ' ', emp.last_name), sal.salary
	FROM employees emp
		INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE emp.emp_no = 10010;
	

-- 4. 사원의 사원번호, 풀네임, 소속부서명을 출력

SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name), de.dept_name
	FROM employees emp
		INNER JOIN dept_emp dept
		ON emp.emp_no = dept.emp_no
		INNER JOIN departments de
		ON de.dept_no = dept.dept_no
WHERE dept.to_date > NOW()
;

-- 5. 현재 월급의 상위 10위까지 사원의 사번, 풀네임 월급을 출력

SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name), sal.salary
	FROM employees emp
		INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.to_date > NOW()
ORDER BY salary DESC
LIMIT 10
;

-- 6. 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력

SELECT d.dept_name, CONCAT(emp.first_name, ' ', emp.last_name), emp.hire_date
	FROM employees emp
		INNER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		INNER JOIN departments d
		ON dm.dept_no = d.dept_no
WHERE to_date >= NOW()
;

-- 7. 현재 직책이 "staff"인 사원의 전체 평균 월급을 출력

SELECT tit.title, AVG(salary)
	FROM salaries sal
		INNER JOIN titles tit
		ON sal.emp_no = tit.emp_no
WHERE sal.to_date >= NOW() AND tit.to_date >= NOW() AND title = 'Staff';

SELECT tit.title, AVG(sal.salary) avg_sal
FROM titles tit
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
		AND tit.to_date >= NOW()
		AND sal.to_date >= NOW()
		AND tit.title = 'Staff'
GROUP BY tit.title;

-- 8. 부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력

SELECT CONCAT(emp.first_name, ' ', emp.last_name), emp.hire_date, emp.emp_no, dm.dept_no
	FROM employees emp
		INNER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no;

-- 9. 현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균월급(정수)를 내림차순으로 출력

SELECT title, FLOOR(AVG(sal.salary)) avg_sal
	FROM titles tit
		INNER JOIN salaries sal
		ON sal.emp_no = tit.emp_no
AND tit.to_date >= NOW() AND sal.to_date >= NOW()
GROUP BY tit.title
HAVING avg_sal >= 60000
ORDER BY avg_sal DESC;

-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력

SELECT tit.title, COUNT(tit.title)
	FROM titles tit
		INNER JOIN employees emp
		ON emp.emp_no = tit.emp_no
WHERE emp.gender = 'F' AND tit.to_date >= NOW()
GROUP BY title
;

-- 11.퇴사한 여직원의 수

SELECT COUNT(*)
	FROM employees emp
		INNER JOIN (
		SELECT emp_no
		FROM titles t
		GROUP BY t.emp_no HAVING MAX(t.to_date) != 99990101
		) tit
		ON emp.emp_no = tit.emp_no
GROUP BY emp.gender;