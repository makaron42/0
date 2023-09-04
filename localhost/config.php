<?php
define('HOST', 'localhost'); // Database server
define('USER', 'root'); // Database username
define('PASSWORD', ''); // Database password
define('DATABASE', 'jopa'); // Database name

/* connect to MySQL database */
$db = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);

// Check db connection
if ($db === false) {
    die("Error: connection error. " . mysqli_connect_error());
}