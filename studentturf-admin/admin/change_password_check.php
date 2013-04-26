<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . './error_log.txt');
error_reporting(E_ALL);
include 'unset_sessions.php';
include 'DB_connection.php';
session_start();

if ($_POST['password'] == null || $_POST['new_password'] == null || $_POST['re_password'] == null) {
    $_SESSION['pw_change_error'] = 'Empty fields not allow..!';
    header('location:change_password.php');
} else {
    $admin_password = $_POST['password'];
    $admin_new_password = $_POST['new_password'];
    $admin_re_password = $_POST['re_password'];

    $row_count = 0;
    try {
        $sql = "SELECT * FROM admin WHERE admin_name='" . $_SESSION['admin'] . "' and password='" . $admin_password . "'";
        $stmt = $db->query($sql);
        $row_count = $stmt->rowCount();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }


    if ($row_count == 0) {
        $_SESSION['pw_change_error'] = "Incorrect existing password..!";
        header('location:change_password.php');
    } else if ($admin_new_password != $admin_re_password) {
        $_SESSION['pw_change_error'] = "Please re-type correct password..!";
    } else {
        $sql = "update admin set password = '" . $admin_new_password . "' where admin_name = '" . $_SESSION['admin'] . "'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row_count = $stmt->rowCount();
        if ($row_count != 0) {
            $_SESSION['pw_change_success'] = 'Successfully changed ..!';
            unset($_SESSION['pw_change_error']);
        } else {
            $_SESSION['pw_change_error'] = 'Error occur, please try again later';
        }
    }
    header('location:change_password.php');
}