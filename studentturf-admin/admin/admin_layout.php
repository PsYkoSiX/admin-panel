<?php
require_once('libs/AdminTemplate.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>
        <?php
        if (isset($TPL->PageTitle)) {
            echo $TPL->PageTitle;
        } ?>
    </title>
    <?php
    if (isset($TPL->ContentHead)) {
        include $TPL->ContentHead;
    } ?>

<!--    <link href="css/bootstrap-responsive.css" rel="stylesheet"/>-->
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/custom.css" rel="stylesheet"/>

    <script src="javascript/bootstrap.js" type="text/javascript"></script>
    <script src="javascript/jqueryLiveValidation.js" type="text/javascript"></script>
    <script src="javascript/jquery.js" type="text/javascript"></script>
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <h4 class="color-white text-right span8">hSenid Student Turf Admin Panel</h4>

            <div class="nav-collapse collapse pull-right padding-10-5">
                <a class="color-white" href="index.php">Home</a>
                <?php if (isset($_SESSION['admin'])) { ?>
                    <span class="color-white"> | </span>
                    <a class="color-white" href="admin_view.php">Admin</a>
                    <span class="color-white"> | </span>
                    <a class="color-white" href="logout.php">Log out</a>
                <?php }?>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container padding-top-50">
    <img src="images/student_turf.jpg">
</div>
<div class="container padding-top-10">
    <?php
    if (isset($TPL->ContentBody)) {
        include $TPL->ContentBody;
    } ?>
</div>
</body>