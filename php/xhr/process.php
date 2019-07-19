<?php
//require_once '../classes/Pdo_methods.php';

$data = $_POST['data'];
//echo $data;
//$data = "select * from names limit 20";

$pdo = new PdoMethods();
$sql = $data;
$records = $pdo->selectNotBinded($sql);

if($records == 'error'){
	echo 'There has been and error processing your request';
}

else {
	if(count($records) != 0){
    	$list = '<ol>';
    	//$var > 2 ? true : false
        foreach ($records as $row) {
    		isset($row['state']) ? $state = $row['state'] : $state = '';
            isset($row['last_name']) ? $lname = $row['last_name'] : $lname = '';
            isset($row['last_name']) ? $lname = $row['last_name'] : $lname = '';
            
            if(isset($row['first_name'])){
                $fname = $row['first_name'];
            }
            else {
                $fname = '';
            }
            $list .= "<li>{$fname} {$lname} {$row['race']} {$row['gender']} {$state}</li>";
    	}
    	$list .= '</ol>';
    	echo $list;
    }
    else {
    	echo 'No Names found';
    }
}