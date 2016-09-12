<?php

require_once 'db.php';
require_once 'json.php';

$fields = [];

foreach($_POST as $fieldName => $valueName) {
	$fields[$fieldName] = $valueName;
}

$db = new db();
$insert = $dbobj->insertSurvey($fields);

if ($insert === true) {
    // succeed function will generate JSON string, with success: true key, and stop the PHP code execution
    // (meaning next lines wont matter)
	succeed();
}
// if code execution gets to this point, $dbobj->insertSurvey didn't return true, so it is a failure
fail("Could not insert the survey information into the database");
