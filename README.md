# A simple php apache and mysql environment in Docker

 * I want to quickly spin up a php apache and mysql environment with Docker on a VM
 * I want to be able to mount my project code and run on the environment on Docker

## Getting Started
After git clone the folder to your machine that has docker installed, inside the folder Run 	
```shell
docker-compose up -d
```
Then go to port 8080 you should see
```
!-- ./php/index.php --> Hello World!!!
Connected successfully
```
There will be two containers running, check with 
```
docker container ls
```

The script will create a 'data' folder inside your folder, mounted from /var/lib/mysql from container php_test_mysql, with a default database test_db

Stop and remove containers by 
```
docker-compose down
```
