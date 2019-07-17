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
			$charset = 'utf8';

			//connect
			try {		
				$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo "Connected successfully";
			} catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}	

			//SELECT FROM query
			$req = $pdo->query("SELECT author, title, year FROM classics");
			foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $record) {
				$results[] = $record;
			}	
			echo '<pre>'; var_dump($results); echo '</pre>';

			// $req = $pdo->query("SELECT author, title, year FROM classics");
			// foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $record) {
			// 	$results[] = $record;
			// }
			echo 'there are ' . (count($results)) . ' records in the classics table';


			//INSERT INTO query
			$author = 'Mary Smith';
			$title = 'The Old Curiosity Shop'; 
			$category = 'Fiction'; 
			$year = '1999'; 
			$isbn = generate_random_isbn();
			$sql = "INSERT INTO classics (author, title, category, `year`, isbn) VALUES (?,?,?,?,?)";
			$stmt= $pdo->prepare($sql);
			$stmt->execute([$author, $title, $category, $year, $isbn]);
			
            function generate_random_isbn(){
				$isbn = '';
				for( $i = 0; $i < 13; $i++ ){
					$isbn .= mt_rand(0,9);
				}	
				return $isbn;
			}


        ?>
    </body>
</html>
