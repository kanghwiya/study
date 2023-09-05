-- 	CASE ~ WHEN ~ ELSE ~ END : 다중 분기를 위해 사용합니다.
--  		예)
-- 			CASE 체크하려는 수식1
-- 				WHEN 분기수식1 THEN 결과1
-- 				WHEN 분기수식2 THEN 결과2
-- 				WHEN 분기수식3 THEN 결과3
-- 				ELSE 결과4
-- 			END

SELECT e.emp_no
	,e.gender
	,CASE e.gender
		when 'M' THEN '남자'
		ELSE '여자'
	END AS ko_gender
FROM employees as e;

UPDATE titles
SET to_date = NULL
WHERE emp_no = 500000;

-- to_date가 null // 9999-01-01인 경우는 '현재직책'
-- 그 외는 '지금은아님'

SELECT *
	,CASE date(ifnull(to_date, 99990101))
		WHEN NULL THEN '현재직책'
		WHEN 99990101 THEN '현재직책'
		ELSE '지금은아님'
	END AS title_now
FROM titles;


-- null 가져오는 방법
WHERE to_date IS NULL 
-- 3. 문자열 함수

SELECT CONCAT('안녕', '하세요.');
-- concat_ws(구분자, 문자열1, 문자열2, ....)
SELECT CONCAT_WS('/','딸기','바나나','토마토','수박');
-- format(숫자, 소수점 자릿수) : 숫자에 ','를 넣어주고, 소수점 자리수
SELECT FORMAT(1234567, 2);
-- left(문자열, 길이) : 문자열을 왼쪽부터 길이만큼 잘라 반환합니다.
SELECT LEFT('123456', 3);
-- right(문자열, 길이) : 문자열을 오른쪽부터 길이만큼 잘라 반환합니다.
SELECT RIGHT('123456', 3);
-- upper(문자열) : 소문자를 대문자로 변경합니다.
SELECT UPPER('abcd');
-- lower(문자열) : 대문자를 소문자로 변경합니다.
SELECT LOWER('ABCD');
--  lpad(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 넣음
SELECT LPAD('1',10,'0');
-- Rpad(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 넣음
SELECT RPAD('1234',10,'가');
-- trim(문자열) : 좌우 공백을 제거합니다.
SELECT '  1238  ', TRIM('  1238  ');
-- ltrim(문자열) : 왼쪽 공백을 제거합니다.
SELECT LTRIM('  1238  ');
-- rtim(문자열) : 오른쪽 공백을 제거합니다.
SELECT RTRIM('  1238  ');
-- trim(방향 문자열1 from 문자열2) : 방향을 지정해 문자열2에서 문자열1을 제거합니다.
-- 		*방향을 LEADING(좌), BOTH(좌우), TRAILING(우)**
SELECT TRIM(LEADING 'abc' FROM 'abcdefg');
-- 		substring(문자열, 시작위치, 길이) : 문자열을 시작위치에서 길이만큼 반환합니다.
SELECT SUBSTRING('abcdef', 3, 2);
-- 		substring_index(문자열, 구분자, 횟수) : 왼쪽부터 구분자가 횟수 번째가 나오면 그 이상은 x
SELECT SUBSTRING_INDEX('현희_html_css.html', '.', 1);

-- 4.수학 함수
-- 	ceiling(숫자) : 올림합니다.
SELECT CEILING(1.4);
SELECT CEIL(1.4);
-- 	floor(숫자) : 버림합니다.
SELECT FLOOR(1.9);
-- 	round(숫자) : 반올림합니다.
SELECT ROUND(1.5), ROUND(1.4);
-- 	truncate(숫자, 정수) : 소수점 기준으로 정수위치까지 구하고 나머지는 버립니다.
되돌릴수없음...

-- 5. 날짜 및 시간 함수
-- 	now() : 현재 날짜/시간을 구합니다. (YYYY-MM-DD HH:MM:DD)
SELECT NOW(), DATE(NOW()), DATE(99990101);
-- 	ADDDATE(날짜1, INTERVAL 날짜2) : 날짜1에서 날짜2를 더한 날짜를 구합니다.
SELECT ADDDATE(99990101, INTERVAL 1 DAY);
-- 	SUBDATE(날짜1, INTERVAL 날짜2) : 날짜1에서 날짜2를 뺀 날짜를 구합니다.
SELECT SUBDATE(99990101, INTERVAL 1 MONTH);
-- 	ADDTIME(날짜/시간, 시간) : 날짜/시간에서 시간을 더한 날짜/시간을 구합니다.
SELECT ADDTIME(20230101000000, '-01:00:00');

SELECT ADDDATE(NOW(), INTERVAL -1 YEAR) AS 동글동그래;

-- 6. 순위 함수
-- RANK() OVER(ORDER BY 속성명 DESC/ASC) : 순위를 매깁니다.
SELECT emp_no, salary, RANK() OVER(ORDER BY salary desc) AS RANK
FROM salaries
LIMIT 10;

-- 	row_number() over(order by 속성명 desc/asc) : 레코드에 순위를 매깁니다.
SELECT emp_no, salary, ROW_NUMBER() OVER(ORDER BY salary DESC) AS num
FROM salaries
LIMIT 10;