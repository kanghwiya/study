CREATE TABLE `members` (
	`mem_no`	INT	NOT NULL	COMMENT '코멘트^^',
	`id`	varchar(30)	NULL,
	`name`	varchar(30)	NULL,
	`addr`	varchar(100)	NULL
);

CREATE TABLE `Points` (
	`mem_no`	INT	NOT NULL	COMMENT '코멘트^^',
	`points`	int	NULL	DEFAULT 0
);

CREATE TABLE `ordered product` (
	`product_no`	int	NOT NULL,
	`prod_name`	varcha(50)	NOT NULL,
	`prod_price`	int	NULL
);

CREATE TABLE `orders` (
	`order_no`	int	NOT NULL,
	`Count`	int	NULL,
	`payment`	int	NULL,
	`mem_no`	int	NOT NULL	COMMENT '코멘트^^',
	`product_no`	int	NOT NULL
);

ALTER TABLE `members` ADD CONSTRAINT `PK_MEMBERS` PRIMARY KEY (
	`mem_no`
);

ALTER TABLE `Points` ADD CONSTRAINT `PK_POINTS` PRIMARY KEY (
	`mem_no`
);

ALTER TABLE `ordered product` ADD CONSTRAINT `PK_ORDERED PRODUCT` PRIMARY KEY (
	`product_no`
);

ALTER TABLE `orders` ADD CONSTRAINT `PK_ORDERS` PRIMARY KEY (
	`order_no`
);

ALTER TABLE `Points` ADD CONSTRAINT `FK_members_TO_Points_1` FOREIGN KEY (
	`mem_no`
)
REFERENCES `members` (
	`mem_no`
);

