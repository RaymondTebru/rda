<?php
date_default_timezone_set('Europe/Amsterdam');	//Set your timezone. A list of supported timezones can be found at http://php.net/manual/en/timezones.php

$db_servername = "localhost";	//Enter the servername. By default it's "localhost"
$db_username = "root";				//Enter the username of the database. By default it's "root"
$db_password = "";			//Enter the password of the database.
$db_name = "radiodj161";			//Enter the databasename. By default it's "radiodj161"

// Create connection
$conn = new mysqli($db_servername, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
