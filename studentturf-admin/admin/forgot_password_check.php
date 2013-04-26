<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . './error_log.txt');
error_reporting(E_ALL);

session_start();
include 'DB_connection.php';
require('libs/class.email_sending.php');

$admin_email = $_POST['email'];
$row_count = 0;
$password = '';
try {
    $sql = "SELECT * FROM admin WHERE admin_name='" . $admin_email . "'";
    $stmt = $db->query($sql);
    $row_count = $stmt->rowCount();
    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
        $password = $row['password'];
    }
} catch (PDOException $ex) {
    echo $ex->getMessage();
}

$email_subject = 'Admin forgot password service';
$email_body = "Hi $admin_email
 <br>
 <br/> Yor have admin permissions and your password is : $password <br/>
 <br/> Thank you..!";

if ($row_count == 1) {
    $email_sender = new EmailSender();
    if ($email_sender->sendEmail($admin_email, $email_subject, $email_body)) {
        $_SESSION['email'] = 'Please check your email. If you have admin permissions, then your password will be receive to above email, Thank you..!';
    } else {
        $_SESSION['email'] = 'Error occur while sending email, please try again later';
    }
} else {
    $_SESSION['email'] = 'Your are not belongs to admin team..!';
}
header('location:forgot_password.php');
