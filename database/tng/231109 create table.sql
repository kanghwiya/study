CREATE DATABASE test;

USE test;

CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT
	,name VARCHAR(30) NOT NULL
	,birth DATE NOT NULL
	,create_at DATETIME default CURRENT_TIMESTAMP()
);

CREATE TABLE product(
	id INT PRIMARY KEY AUTO_INCREMENT
	,p_name VARCHAR(100) NOT NULL
	,p_price INT NOT NULL
);

CREATE TABLE sellinfo(
	id INT PRIMARY KEY AUTO_INCREMENT
	,ship_flg CHAR(1) NOT NULL DEFAULT '0'
	,u_id INT NOT NULL
	,p_id INT NOT NULL
);


-- 기본 fk 설정
ALTER TABLE sellinfo ADD CONSTRAINT fk_delivery_u_id FOREIGN KEY(u_id)
REFERENCES user(id);

ALTER TABLE sellinfo ADD CONSTRAINT fk_delivery_p_id FOREIGN KEY(p_id)
REFERENCES product(id);

COMMIT;

-- DROP TABLE sellinfo;
-- DROP DATABASE test;
-- 

INSERT INTO user(NAME, birth)
VALUES('갑돌이', 19600114);

INSERT INTO product(p_name, p_price)
VALUES ('고구마', 3000);

INSERT INTO sellinfo(u_id, p_id)
VALUES(1, 1);

UPDATE user
SET NAME='갑갑이'
WHERE id = 1;


-- DELETE FROM sellinfo WHERE id = 1;
-- 
-- TRUNCATE TABLE sellinfo;