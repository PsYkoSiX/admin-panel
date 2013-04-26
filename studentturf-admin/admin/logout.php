<?php
session_start();
include 'session_check.php';
session_destroy();
header('location:index.php');