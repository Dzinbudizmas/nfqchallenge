CREATE TABLE orders (
	id int NOT NULL AUTO_INCREMENT,
	name varchar(120) NOT NULL,
	address varchar(120) NOT NULL,
	phone varchar(15) NOT NULL,
	text text NULL,
	PRIMARY KEY (id)
);