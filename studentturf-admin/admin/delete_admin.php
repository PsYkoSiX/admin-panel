<?php
session_start();
$_SESSION['admin_remove'] = $_GET['remove'];
echo "<h5>Are you sure to permanently delete admin : " . $_GET['remove']."</h5>";
