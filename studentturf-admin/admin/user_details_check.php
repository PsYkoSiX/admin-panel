<?php if (isset($_GET['userId'])) {
    include 'user_details.php';
} else {
    echo 'User details not available on user Id : ' . $_GET['userId'];
}