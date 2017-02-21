DROP TABLE IF EXISTS myplan, tags, user;
CREATE TABLE user (
	id INT AUTO_INCREMENT,
	password VARCHAR(10),
	username VARCHAR(45),
	email VARCHAR(60),
	name VARCHAR(60),
	dob DATE,
	location VARCHAR(40),
	picture VARCHAR(100),
	PRIMARY KEY (id)
);

CREATE TABLE tags (
	id INT AUTO_INCREMENT,
	tag VARCHAR(10),
	PRIMARY KEY (id)
);

CREATE TABLE myplan (
	id INT AUTO_INCREMENT,
	destination VARCHAR(30),
	startDate DATE,
	endDate DATE,
	ageRange INT,
	description VARCHAR(250),
	user_id INT,
	tags_id INT,
	PRIMARY KEY(id),
	FOREIGN KEY( user_id)
		REFERENCES user(id)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	FOREIGN KEY ( tags_id)
		REFERENCES tags(id)
		ON UPDATE CASCADE
		ON DELETE CASCADE
); 

