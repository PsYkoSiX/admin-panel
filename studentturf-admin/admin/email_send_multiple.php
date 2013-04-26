<?php if (isset($_GET['userCount']) && $_GET['userCount'] > 0) {
    include 'email_send_body.php';
} else {
    echo 'Users not available, cannot send the email';
}