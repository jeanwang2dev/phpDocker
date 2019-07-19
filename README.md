# Building a simple php apache and mysql environment in Docker

 * I want to quickly spin up a php apache and mysql environment with Docker on a Remote Sever
 * I want to be able to mount my project code and run on the environment on Docker
 * I want to be able to customize your MySQL Database in Docker with pre-populated data
   * There are three ways to pre-populated the data
     1. Import the .sql file with phpMyAdmin manually after the services are up (this one doesn't really count as pre-populated) [see code from my branch](https://github.com/jeanwang2dev/phpDocker/tree/importDB-with-phpMyAdmin)
     2. Copy the sql scripts into the mysql container startup folder with Dockerfile then build the image with customized database [see code from my branch](https://github.com/jeanwang2dev/phpDocker/tree/copy-script-in-Dockerfilehttps://github.com/jeanwang2dev/phpDocker/tree/copy-script-in-Dockerfile)
     3. Bind Mount the sql scripts folder to the startup folder in mysql container [see code from my branch](https://github.com/jeanwang2dev/phpDocker/tree/bindmout-scriptsfolder)
 
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
You can go to 8081 login to phpMyAdmin to add or delete records in the table classics, and refresh the index.php page on port 8080 to view to change.

Stop and remove containers by 
```
docker-compose down
```


