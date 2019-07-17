CREATE TABLE classics (
author VARCHAR(128),
title  VARCHAR(128),
category VARCHAR(16),
year  CHAR(4),
INDEX(author(20)),
INDEX(title(20)),
INDEX((category(4)),
INDEx(year),
id INT UNSIGNED NOT NUL AUTO_INCREMENT KEY) engine MyISAM;
