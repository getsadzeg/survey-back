<?php
include 'db.php'
	$fields = [];
	foreach($_POST as $fieldName => $valueName) {
		fields[$fieldName] = $valueName;
	}
	dbobj = new db();
	$success = dbobj->insertSurvey($fields) === true;
	echo json_encode([
		"success" => $success
	]);
?>

