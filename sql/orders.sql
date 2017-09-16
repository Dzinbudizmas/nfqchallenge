CREATE TABLE orders (
	id int NOT NULL AUTO_INCREMENT,
	name varchar(120) NOT NULL,
	address varchar(250) NOT NULL,
	phone varchar(15) NOT NULL,
	amount int NOT NULL,
	notes text NOT NULL,
	PRIMARY KEY (id)
);