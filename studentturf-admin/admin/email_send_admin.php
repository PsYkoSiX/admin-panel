<?php
session_start();
include 'DB_connection.php';

$sql = "SELECT * FROM admin where cc_status = 'checked'";
$stmt = $db->query($sql);
$list_count = $stmt->rowCount();
$email_list = '';

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $email_list = $email_list . $row['admin_name'] . ',';
}
$_SESSION['email_list'] = $email_list;

if ($list_count > 0) {
    include 'email_send_admin_body.php';
} else {
    echo 'No included admins, cannot send the email';
}