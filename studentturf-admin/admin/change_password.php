<?php
session_start();
include 'session_expire.php';
include 'admin_layout.php';
?>
<div class="container">
    <div class="row-fluid">
        <div class="span8 text-justify padding-10">
            <span>
                In order to change your password, you have to provide your old password, new password and retype the
                new password again.
            </span>
        </div>
        <div class="span4">
            <form method="post" class="form-signin" action="change_password_check.php">
                <h4>Type your passwords</h4>
                <label>
                    <input type="password" name="password" class="input-block-level" placeholder="Existing Password"/>
                </label>
                <label>
                    <input type="password" name="new_password" class="input-block-level" placeholder="New password"/>
                </label>
                <label>
                    <input type="password" name="re_password" class="input-block-level" placeholder="Re-type password"/>
                </label>

                <div>
                    <button type="submit" class="btn btn-small btn-success">Send</button>
                </div>
                <?php if (isset($_SESSION['pw_change_error'])) { ?>
                    <div class="alert alert-error padding-top-10">
                        <span><?php echo $_SESSION['pw_change_error'] ?></span>
                    </div>
                <?php }?>
                <?php if (isset($_SESSION['pw_change_success'])) { ?>
                    <div class="alert alert-success padding-top-10">
                        <span><?php echo $_SESSION['pw_change_success'] ?></span>
                    </div>
                <?php }?>
            </form>
        </div>
    </div>
</div>