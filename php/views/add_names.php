<?php 
require_once '../classes/Page.php';
$page = new Page();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>CRUD Example</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../public/css/main.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div id="wrapper" class="container">
      <header>
        <h1>Home Page</h1>
      </header>
      <?php echo $page->nav(); ?>
      <main>
        <div class="row">
          <div class="col-md-3" id="result"></div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <input type="text" class="form-control" placeholder="first name" name="fname" value="Jane">
          </div>
          <div class="col-md-3">
            <input type="text" class="form-control" placeholder="last name" name="lname" value="Doe">
          </div> 
        </div>
        <div class="row">
          <div class="col-md-2">
            <input type="text" class="form-control" placeholder="eye color" name="color" value="green">
          </div>
          <div class="col-md-2">
            <input type="text" class="form-control" placeholder="gender" name="gender" value="Female">
          </div>
          <div class="col-md-2">
            <input type="text" class="form-control" placeholder="state" name="state" value="oh">
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <input type="button" class="btn btn-primary" id="addName" value="Add Name">
          </div>
        </div>
      </main>

    </div>
    

    <script src="../public/js/main.js"></script>
  </body>
</html>