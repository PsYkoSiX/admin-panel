<?php if (isset($_GET['userEmail'])) { ?>
    <div class="text-warning">
        <h5>WARNING: This will permanently delete all the user data of [<?php echo $_GET['userEmail']?>],
        Are your sure to remove this user...?</h5>
    </div>
    <div class="text-center">
        <a href="user_remove_check.php?userEmail=<?php echo $_GET['userEmail'] ?>" class="text-error bold">I'm sure,
            remove the user</a>
    </div>
<?php
} else {
    echo 'User email not available on : ' . $_GET['userEmail'];
}