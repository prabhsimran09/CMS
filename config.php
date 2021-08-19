<?php

// This file contains database configuration assuming that you are running mysql using user "root" and pass ""

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASS', '');
define('DB_NAME', 'admin_panel');

//  Try connecting to the database

$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASS, DB_NAME);
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

if (!$con) {
    die ( "Connection to this database failed due to " . mysqli_connect_error());
}


?>
