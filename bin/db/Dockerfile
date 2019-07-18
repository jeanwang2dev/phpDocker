# Derived from official mysql image (our base image)
From mysql:5.7

# Add a database
ENV MYSQL_ROOT_PASSWORD simple_psw
ENV MYSQL_DATABASE test_db
ENV MYSQL_USER devuser
ENV MYSQL_PASSWORD simple_psw

# Add the content of the sql-scripts/ directory to your image
# All scripts in docker-entrypoint-initdb.d/ are automatically executed during container startup
COPY ./sql-scripts/*.sql /docker-entrypoint-initdb.d/