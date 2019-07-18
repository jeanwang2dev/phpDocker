CREATE TABLE classics (
author VARCHAR(128),
title  VARCHAR(128),
category VARCHAR(16),
year  CHAR(4),
INDEX( author(20) ),
INDEX( title(20) ),
INDEX( category(4) ),
INDEX( year ),
id INT UNSIGNED NOT NULL AUTO_INCREMENT KEY) engine MyISAM;
