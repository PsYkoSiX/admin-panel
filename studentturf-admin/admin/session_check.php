<?php
if (!isset($_SESSION['admin'])) {
    session_destroy();
    header('location:index.php');
}