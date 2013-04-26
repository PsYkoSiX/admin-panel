<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . './error_log.txt');
error_reporting(E_ALL);

session_start();
include 'DB_connection.php';
if ($_POST['password'] == null || $_POST['username'] == null) {
    $_SESSION['login_error'] = 'Do not send empty values..!';
    header('location:index.php');
} else {
// username and password sent from form 
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];
    $row_count = 0;

// To protect MySQL injection (more detail about MySQL injection)
    try {
        $sql = "SELECT * FROM admin WHERE admin_name='" . $admin_username . "' and password='" . $admin_password . "'";
        $stmt = $db->query($sql);
//    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $stmt->rowCount();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

    if ($row_count == 1) {
        $_SESSION['admin'] = $admin_username;
        $_SESSION['LAST_ACTIVITY'] = time();
        unset($_SESSION['login_error']);
    } else {
        $_SESSION['login_error'] = "Invalid username or password";
    }
    header('location:index.php');
}
