<?php

// for CORS policy
header("Access-Control-Allow-Origin: http://localhost:8888");
header("Access-Control-Allow-Headers: X-Requested-With");

// to specify that returned info of this php is an json
header('Content-Type: application/json');

// get data from json file 
$reminderData_json = file_get_contents("./json/reminder_data.json");

// print 
echo $reminderData_json;
