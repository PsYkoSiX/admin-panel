<?php
$host = "127.0.0.1";
$username = "user";
$password = "password";
$db_name = "studentturf";
$tbl_name = "admin";
$socket = "unix_socket=/tmp/mysql.sock";

// Connect to server and select database.
$db = new PDO('mysql:host=' . $host . ';dbname=' . $db_name . ';charset=utf8;', $username, $password);