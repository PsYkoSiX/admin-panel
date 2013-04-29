<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . './error_log.txt');
error_reporting(E_ALL);

include 'DB_connection.php';
session_start();

if ($_POST['username'] == null || $_POST['password'] == null || $_POST['re_password'] == null) {
    $_SESSION['pw_add_error'] = 'Please do not send empty values..!';
    header('location:admin_view.php');
} else {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];
    $admin_re_password = $_POST['re_password'];

    $row_count = 0;

    try {
        $sql = "SELECT * FROM admin WHERE admin_name='" . $admin_username . "'";
        $stmt = $db->query($sql);
        $row_count = $stmt->rowCount();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }

    if ($row_count == 1) {
        $_SESSION['pw_add_error'] = 'Admin already exist..!';
        unset($_SESSION['login_success']);
    } else if ($admin_password != $admin_re_password) {
        $_SESSION['pw_add_error'] = "Please re-type correct password..!";
    } else {
        $sql = "insert into admin (id, admin_name, password) value ('', '" . $admin_username . "','" . $admin_password . "')";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row_count = $stmt->rowCount();
        if ($row_count > 0) {
            $_SESSION['pw_add_success'] = 'Admin successfully added..!';
            unset($_SESSION['pw_add_error']);
        } else {
            $_SESSION['pw_add_error'] = 'Error occur, please try again later';
        }
    }
    header('location:admin_view.php');
}