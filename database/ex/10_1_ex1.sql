DELIMITER $$
CREATE PROCEDURE test()
BEGIN
	SELECT emp.*
		,tit.title
	FROM employees emp
		JOIN 	titles tit
			ON emp.emp_no = tit.emp_no
			AND tit.to_date >= NOW();
END $$
DELIMITER;

SHOW PROCEDURE STATUS;

CALL test();

DROP PROCEDURE test;

