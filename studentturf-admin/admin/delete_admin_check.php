<?php
session_start();
include 'DB_connection.php';
$sql = "delete from admin where admin_name='" . $_SESSION['admin_remove']."'";
$stmt = $db->prepare($sql);
$stmt->execute();
$row_count = $stmt->rowCount();
if ($row_count != 0) {
    $_SESSION['admin_delete_success'] = 'Successfully admin deleted...!';
    unset($_SESSION['admin_delete_error']);
} else {
    $_SESSION['admin_delete_error'] = 'Error occur, please try again later';
    unset($_SESSION['admin_delete_success']);
}

header('location:admin_view.php');