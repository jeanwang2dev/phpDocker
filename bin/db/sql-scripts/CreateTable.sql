CREATE TABLE short_names (
first_name VARCHAR(25),
last_name  VARCHAR(25),
eye_color VARCHAR(16),
gender VARCHAR(6),
state VARCHAR(10),
INDEX( first_name(20) ),
INDEX( last_name(20) ),
INDEX( eye_color(4) ),
INDEX( gender),
INDEX( state ),
id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY) engine MyISAM;
