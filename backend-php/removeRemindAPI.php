<?php
// for CORS policy
header("Access-Control-Allow-Origin: http://localhost:8888");
header("Access-Control-Allow-Headers: X-Requested-With");

// to specify that returned info of this php is an json file
header('Content-Type: application/json');

///////////////////////////////////////////////////////////////////////////////////////////////

// READ JSON FILE

// ADD reminder_data.json TO reminderList_json (php string)(json formatted) 
$reminderList_json = file_get_contents("./json/reminder_data.json", true); // <--- cosa serve true

// ADD DECODED reminderList_json (php string)(json formatted) TO reminderList (php array)
$reminderList = json_decode($reminderList_json);

///////////////////////////////////////////////////////////////////////////////////////////////

// REMOVE NEW REMIND //////////// ??????????????????????????????

// get "index" value from axios.get parameters (from myscript.js)
$index = $_GET["index"];

$reminderList[$index]->status = true;


foreach ($reminderList as $key => $value) {
    if ($value->status == true) {
        array_splice($reminderList, $key, 1);
    }
};

///////////////////////////////////////////////////////////////////////////////////////////////

// WRITE JSON FILE

// ADD ENCODED reminderList (php array) TO reminderList_json (php string)(json formatted) 
$reminderList_json = json_encode($reminderList);

// ADD reminderList_json (php string) TO reminder_data.json (json file) 
file_put_contents("./json/reminder_data.json", $reminderList_json);

// debug
$reminderList_json = file_get_contents("./json/reminder_data.json", true); // <--- cosa serve true
$reminderList = json_decode($reminderList_json);
var_dump($reminderList);
