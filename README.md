# Building a simple php apache and mysql environment in Docker

 * I want to quickly spin up a php apache and mysql environment with Docker on a Remote Sever
 * I want to be able to mount my project code and run on the environment on Docker
 * I want to be able to customize your MySQL Database in Docker with pre-populated data
 
 NOTE: make sure your server have port 8080 and 8081 open
 
## I used pre-wroted sql scripts to populate the mysql image so when the services starts I have an initialed table in it

 * There are two sub-folders in the bin folder: one for building db image; one for building app image
 * The db sub-folder includes the sql scripts folder to copy to /docker-entrypoint-initdb.d/ when building the image in Dockerfile
 * All scripts in docker-entrypoint-initdb.d/ are automatically executed during container startup
 * I learn from [this article](https://medium.com/better-programming/customize-your-mysql-database-in-docker-723ffd59d8fb)

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
array(3) {
  [0]=>
  array(1) {
    ["author"]=>
    string(10) "Mark Twain"
  }
  [1]=>
  array(1) {
    ["author"]=>
    string(10) "Jane Auten"
  }
  [2]=>
  array(1) {
    ["author"]=>
    string(14) "Charles Darwin"
  }
}
```

The script will create a 'data' folder inside your folder, mounted from /var/lib/mysql from container php_test_mysql, with a default database test_db

Stop and remove containers by 
```
docker-compose down
```


