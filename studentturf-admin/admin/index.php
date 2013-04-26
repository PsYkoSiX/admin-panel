<?php
require_once('libs/AdminTemplate.php');
session_start();
include 'session_expire.php';
include 'unset_sessions.php';

if (!isset($TPL)) {
    $TPL = new AdminTemplate();
    $TPL->PageTitle = 'Admin ' . $_SESSION['admin'];
    $TPL->ContentHead = 'Admin ' . $_SESSION['admin'];

    if (isset($_SESSION['admin'])) {
        $TPL->ContentBody = 'user_view.php';
    } else {
        $TPL->ContentBody = 'admin_login.php';
    }
    include 'admin_layout.php';
}