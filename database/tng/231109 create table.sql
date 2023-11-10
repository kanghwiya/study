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
	,ship_flg CHAR(1) NOT NULL
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
-- DELETE FROM sellinfo WHERE id = 1;
-- 
-- TRUNCATE TABLE sellinfo;