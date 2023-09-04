-- 	INSERT의 기본구조
--  INSERT INTO 테이블명 [(속성1, 속성2)]
--  VALUES (속성값1, 속성값2)

--  500000 신규회원
INSERT INTO employees (
	emp_no,
	birth_date,
	first_name,
	last_name,
	gender,
	hire_date
)
VALUES (
	500000
	,NOW()
	,'Meerkat'
	,'Green'
	,'M'
	,NOW()
);


-- commit 실행 후 바로 삭제
SELECT * FROM employees WHERE emp_no = 500000;

-- 위 사원의 급여 입력

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,700000
	,NOW()
	,NOW()
);

SELECT * FROM salaries WHERE emp_no = 500000;

-- 위 사원의 소속부서 데이터를 삽입

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
	)
VALUES (
	500000
	,'d006'
	,20230904
	,99990101
);

SELECT * from dept_emp WHERE emp_no = 500000;

-- 500000번 사원의 직책 데이터를 삽입해주세요.

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'Staff'
	,NOW()
	,99990101
);

SELECT * from titles WHERE emp_no = 500000;