CREATE TABLE todolist(
id INT PRIMARY KEY AUTO_INCREMENT
,category_id CHAR(1) NOT NULL
,title VARCHAR(100) NOT NULL
,detail VARCHAR(200) NOT NULL
,create_at DATE DEFAULT CURRENT_TIMESTAMP
,revise_at DATE DEFAULT CURRENT_TIMESTAMP
,delete_at DATE DEFAULT NULL
);

COMMIT;

INSERT INTO todolist (category_id, title, detail, create_at, revise_at)
VALUES (1, '제목1', '내용1', NOW(), NOW())
,(2, '제목1', '내용1', NOW(), NOW())
,(3, '제목1', '내용1', NOW(), NOW())
,(4, '제목1', '내용1', NOW(), NOW())
,(1, '제목1', '내용1', NOW(), NOW())
,(2, '제목1', '내용1', NOW(), NOW())
,(3, '제목1', '내용1', NOW(), NOW())
,(4, '제목1', '내용1', NOW(), NOW())
,(1, '제목1', '내용1', NOW(), NOW())
,(2, '제목1', '내용1', NOW(), NOW())
,(3, '제목1', '내용1', NOW(), NOW())
,(4, '제목1', '내용1', NOW(), NOW());

COMMIT;
flush PRIVILEGES;

INSERT INTO todolist (category_id, title, detail, create_at, revise_at)
VALUES(1,':title', ':detail', NOW(), NOW());

SELECT id, title
FROM todolist
WHERE create_at >= CURDATE()
AND delete_at IS not NULL
ORDER BY id DESC
LIMIT 3
OFFSET 3;

SELECT category_id, title
FROM todolist WHERE create_at = 20231031 AND delete_at IS NULL;

SELECT COUNT(id) AS cnt
FROM todolist WHERE delete_at IS NULL AND create_at = 20231031;

SELECT category_id, title, detail, create_at FROM todolist WHERE id = 3;

UPDATE todolist
SET 
	category_id = 1
	,title = 'title'
	,detail = 'detail'
	,create_at = 231104
	,revise_at = NOW()
WHERE id = 77;

COMMIT;