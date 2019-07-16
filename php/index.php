<html>
    <head>
        <title>Hello World</title>
    </head>

    <body>
        <?php
            $db = 'test_db';
	    $user = 'devuser';
	    $pass = 'simple_psw';
	    $host = 'php_test_mysql';

	try {		
  		$db = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
	 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  		echo "Connected successfully";
	} catch (PDOException $e) {
  	  echo "Connection failed: " . $e->getMessage();
	}	

	$req = $db->query("SELECT author FROM classics");
	foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $record) {
		$results[] = $record;
	}	
	echo '<pre>'; var_dump($results); echo '</pre>';

        ?>
    </body>
</html>
