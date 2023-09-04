-- 숫자 데이터 형식
-- INT : 4byte 정수
-- BIGINT : 8byte 정수, 범위 +900경 ~ -900경
-- FLOAT : 4byte 실수, 소수점 아래 7자리까지 표현
-- DOUBLE : 0byte 실수, 소수점 아래 15자리까지 표현
-- DECIMAL : 5~15 byte, 소수점 아래 자리를 지정가능 예) DECIMAL(6,2)



-- 문자 데이터 형식
'7289173'
-- CHAR(n) : 1~255byte, (n은 정수) n만큼 고정길이를 가지는 문자형
-- VARCHAR(n) : 1~65535byte, n만큼 가변길이를 가지는 문자형
-- lONGTEXT : 최대 4Gb, text 데이터 값을 저장
-- lONGBLOB : 최대 4Gb, BLOB 데이터 값을 저장
--  ENUM(값1, 값2, 값3...) : 정해진 값만 입력 가능하도록하는 데이터 형식




-- 날짜 및 시간 데이터 형식
-- DATE : 3byte, 'YYYY-MM-DD '1001-01-01' ~ '9999-12-31 범위 저장
-- DATETIME : 8byte, 'YYYY-MM-DD hh:mi:ss' 1001-01-01 00:00:00 ~ 9999-12-31 23:59:59 범위 저장
-- ㄴ프로젝트할때는 아무거나 쓰세용 ^^
-- TIMESTAMP : 4byte, 'YYYY-MM-DD hh:mi:ss' 1001-01-01 00:00:00 ~ 9999-12-31 23:59:59 범위 저장
-- 			**주의**
-- DATETIME과 TIMESTAMP의 차이
-- DATETIME : 날짜와 시간 데이터가 내가 입력한 값으로 고정
-- TIMESTAMP : 서버 시간에 따라 유동적으로 변하는 형식