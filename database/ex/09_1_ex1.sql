-- 0. INDEX란?
-- 

SHOW INDEX FROM employees;

--  6. INDEX 생성
-- CREATE INDEXT 인덱스명 ON 테이블(컬럼);

CREATE INDEX idx_employees_last_name ON employees(last_name);

-- 7. INDEX 제거
-- DROP INDEX 인덱스명 ON  테이블
DROP INDEX idx_employees_last_name ON employees;

