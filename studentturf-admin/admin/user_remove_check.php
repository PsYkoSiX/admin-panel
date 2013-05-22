<?php
session_start();
include 'session_expire.php';
include 'session_check.php';
include 'DB_connection.php';

$sql1 = "delete from user where user_name = '" . $_GET['userEmail'] . "'";
$sql2 = "delete from userInfo where email = '" . $_GET['userEmail'] . "'";
$stmt = $db->prepare($sql1);
$stmt->execute();
$stmt = $db->prepare($sql2);
$stmt->execute();

$row_count = $stmt->rowCount();
if ($row_count > 0) {
    $_SESSION['header_message_success'] = 'User : [' . $_GET['userEmail'] . '] successfully removed...';
    unset($_SESSION['header_message_error']);
} else {
    $_SESSION['header_message_error'] = 'Error occur while removing user [' . $_GET['userEmail'] . '], please try again later';
    unset($_SESSION['header_message_success']);
}

header("location:index.php?page=" . $_SESSION['page']);