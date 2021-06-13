<?php

// tools for extraction sql data to json

// connect db
$servername = "localhost";
$username = "userdb";
$password = "pwddb";
$database = "db";

$list_table = array("");

// Create connection
$conn = new mysqli($servername, $username, $password);


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->select_db($database);

$obj = new \stdClass;

// query data
foreach ($list_table as $key => $value) {
    $q = "select * from ".$value;
    $result = $conn->query($q);
    $result_obj = $result->fetch_all(MYSQLI_ASSOC);
    $obj->$value = $result_obj;
}

// print json value
echo(json_encode($obj));
?>