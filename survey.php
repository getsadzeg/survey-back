<?php
ini_set("error_reporting", E_ALL);
ini_set("display_errors", true);


require_once 'db.php';
require_once 'json.php';

$fields = [];

// if surveyobj key is set in the post request, decode the JSON
if (isset($_POST["surveyobj"])) {
	$fields = json_decode($_POST["surveyobj"], true);
	// if json_decode returns some kind of error (if provided string is not a json)
	// just use an empty array
	if (!$fields) $fields = [];
}

print_r($fields);

$dbobj = new db();
$insert = $dbobj->insertSurvey($fields);

if ($insert === true) {
	// succeed function will generate JSON string, with success: true key, and stop the PHP code execution
	// (meaning next lines wont matter)
	succeed();
}
// if code execution gets to this point, $dbobj->insertSurvey didn't return true, so it is a failure
fail("Could not insert the survey information into the database");
?>
