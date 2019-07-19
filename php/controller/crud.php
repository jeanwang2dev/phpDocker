<?php
require_once '../classes/Pdo_methods.php';

function getNames($type){
	/* CREATE AN INSTANCE OF THE PDOMETHODS CLASS*/
	$pdo = new PdoMethods();

	/* CREATE TEH SQL */
	$sql = "SELECT * FROM short_names";
	$records = $pdo->selectNotBinded($sql);

	/* IF THERE WAS AN ERROR DISPLAY MESSAGE*/
	if($records == 'error'){
		return 'There has been and error processing your request';
	}
	
	/* IF THERE ARE SOME RECORDS THEN DEPENDING ON THE TYPE CALL THE APPROPRIATE FUNCTION CREATELIST OR CREATE INPUT*/
	else{
		if(count($records) != 0){
			if($type == 'list'){return createList($records);}
			if($type == 'input'){return createInput($records);}	
		}
		else {
			return 'no names found';
		}
	}
}


/*IF WE ARE TO CREATE THE LIST DO THE FOLLOWING*/
function createList($records){
	$list = '<ol>';
	foreach ($records as $row){
		$list .= "<li>Name: {$row['first_name']} {$row['last_name']} - Eye Color: {$row['eye_color']} - Gender: {$row['gender']} - State: {$row['state']}</li>";
	}
	$list .= '</ol>';
	return $list;
}

/*IF WE ARE TO CREATE AN INPUT BOX DO THE FOLLOWING */
function createInput($records){
	$output = '';
	foreach ($records as $row){
		$output .= "<div class='row'>";
		$output .= "<div class='col-md-2'><input type='text' class='form-control' name='fname' value='".$row['first_name']."'></div>";
		$output .= "<div class='col-md-2'><input type='text' class='form-control' name='lname' value='".$row['last_name']."'></div>";
		$output .= "<div class='col-md-1'><input type='text' class='form-control' name='color' value='".$row['eye_color']."'></div>";
		$output .= "<div class='col-md-2'><input type='text' class='form-control' name='gender' value='".$row['gender']."'></div>";
		$output .= "<div class='col-md-1'><input type='text' class='form-control' name='state' value='".$row['state']."'></div>";
		$output .= "<div class='col-md-4'><input type='button' class='btn btn-success' id='u".$row['id']."' value='Update' >&nbsp;<input type='button' class='btn btn-danger' id='d".$row['id']."' value='Delete' ></div>";
		$output .= "</div>";

	}
	
	return $output;
}

function addName($dataObj){
	$pdo = new PdoMethods();

	$sql = "INSERT INTO short_names (first_name, last_name, eye_color, gender, state) VALUES (:fname, :lname, :eyecolor, :gender, :state)";
    $bindings = array(
		array(':fname',$dataObj->fname,'str'),
		array(':lname',$dataObj->lname,'str'),
		array(':eyecolor',$dataObj->color,'str'),
		array(':gender',$dataObj->gender,'str'),
		array(':state',$dataObj->state,'str')
	);
	$result = $pdo->otherBinded($sql, $bindings);
	if($result = 'noerror'){
		return 'Account has been updated';
	}
	else {
		return 'There was a problem updating the account';
	}

}

function updateName($dataObj){
	$pdo = new PdoMethods();
	$sql = "UPDATE short_names SET first_name = :fname, last_name = :lname, eye_color = :eyecolor, gender = :gender, state = :state WHERE id = :id";
	$bindings = array(
		array(':fname',$dataObj->fname,'str'),
		array(':lname',$dataObj->lname,'str'),
		array(':eyecolor',$dataObj->color,'str'),
		array(':gender',$dataObj->gender,'str'),
		array(':state',$dataObj->state,'str'),
		array(':id',$dataObj->id,'int')		
	);
	$result = $pdo->otherBinded($sql, $bindings);
	if($result = 'noerror'){
		return 'Account has been updated';
	}
	else {
		return 'There was a problem updating the account';
	}
}

function deleteName($dataObj){
	$pdo = new PdoMethods();
	$sql = "DELETE FROM short_names WHERE id = :id";
	$bindings = array(
		array(':id',$dataObj->id,'str')
	);
	$result = $pdo->otherBinded($sql, $bindings);
	if($result = 'noerror'){
		return 'Account has been updated';
	}
	else {
		return 'There was a problem updating the account';
	}

}

