CREATE DATABASE mini_multi_board;
USE mini_multi_board;

-- 테이블1
CREATE TABLE USER(
	id INT PRIMARY KEY AUTO_INCREMENT
	,u_id VARCHAR(20) NOT NULL
	,u_pw VARCHAR(256) NOT NULL
	,u_name VARCHAR(50) NOT NULL
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME
);


CREATE TABLE board(
	id INT PRIMARY KEY AUTO_INCREMENT
	,u_pk INT NOT NULL
	,b_type CHAR(1) NOT NULL
	,b_title VARCHAR(30) NOT NULL
	,b_content VARCHAR(1000) NOT NULL
	,b_img VARCHAR(50)
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME
);

CREATE TABLE boardname(
	id INT PRIMARY KEY AUTO_INCREMENT
	,b_type CHAR(1) NOT NULL
	,b_name VARCHAR(15) NOT NULL
);

USE mini_multi_board;

-- user table insert
INSERT INTO user(u_id, u_pw, u_name)
VALUES ('admin', 'MTIzNDU2Nzg=', '관리자')
,('user1', 'MTIzNDU2Nzg=','유저1');

-- board table insert
INSERT INTO board(u_pk, b_type, b_title, b_content)
VALUES ('1', '0', '관리자가 쓴 제목1', '관리자가 쓴 내용1')
,('1', '0', '관리자가 쓴 제목2', '관리자가 쓴 내용2')
,('2', '1', '유저1이 쓴 제목2', '유저1이 쓴 내용2')
,('2', '1', '유저1이 쓴 제목2', '유저1이 쓴 내용2')


-- boardname table insert
INSERT INTO boardname(b_type, b_name)
VALUES ('0', '자유게시판'), ('1', '질문게시판');

COMMIT;
