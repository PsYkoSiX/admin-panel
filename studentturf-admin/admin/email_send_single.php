<?php if (isset($_GET['userEmail'])) {
    include 'email_send_body.php';
} else {
    echo 'User email not available on : ' . $_GET['userEmail'];
}