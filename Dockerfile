# I want to create an image that is apache runs php and has PDO installed on it
FROM php:apache

RUN docker-php-ext-install pdo_mysql

WORKDIR /var/www/html

#COPY ./ /var/www/html
#RUN chmod -R 755 /var/www/html