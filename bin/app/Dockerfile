# I want to create an image that is apache runs php and has PDO installed on it
FROM php:7.2-apache-stretch

# installl php extension pdo
RUN docker-php-ext-install \
    pdo_mysql \
    mysqli

# copy the connection file under the home directory
COPY ./Db_conn.php /home/

WORKDIR /var/www/html

#COPY ./ /var/www/html
#RUN chmod -R 755 /var/www/html