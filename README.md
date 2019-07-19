# Building a simple php apache and mysql environment in Docker -- Copy script folder to the script startup folder in container

 * I want to quickly spin up a php apache and mysql environment with Docker on a Remote Sever
 * I want to be able to mount my project code and run on the environment on Docker
 * I want to be able to import my initial tables into the database with phpMyAdmin
 
 NOTE: make sure your server have port 8080 and 8081 open

## Getting Started
After git clone the folder to your machine that has docker installed, inside the folder Run 	
```shell
docker-compose up -d
```

There will be three containers running, check with 
```
docker container ls
```

Then go to port 8080 you should see
```
Connected successfully
Fatal error: Uncaught PDOException: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'test_db.classics' doesn't exist in /var/www/html/index.php:21 Stack trace: #0 /var/www/html/index.php(21): PDO->query('SELECT author F...') #1 {main} thrown in /var/www/html/index.php on line 21
```

To import the initial table into database, go to port 8081, use the credential to login, then use the 'import' tab to import classics.sql file. Then refresh your index.php on port 8080, you should see
```
Connected successfully
array(5) {
  [0]=>
  array(1) {
    ["author"]=>
    string(15) "Charles Dickens"
...
}
```


The script will create a 'data' folder inside your folder, mounted from /var/lib/mysql from container php_test_mysql, with a default database test_db

Stop and remove containers by 
```
docker-compose down
```
