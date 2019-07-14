<html>
    <head>
        <title>Hello World</title>
    </head>

    <body>
        <?php
            $db = 'test_db';
	    $user = 'devuser';
	    $pass = 'simple_password';
	    $host = 'php_test_mysql';

	try {		
  		$db = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
	 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  		echo "Connected successfully";
	} catch (PDOException $e) {
  	  echo "Connection failed: " . $e->getMessage();
	}	

        ?>
    </body>
</html>
