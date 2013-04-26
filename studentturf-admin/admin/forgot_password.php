<?php
session_start();
include 'admin_layout.php';
?>
<div class="container">
    <div class="row-fluid">
        <div class="span8 text-justify padding-10">
            <span>
                hSenid Student Turf admin forgot password service will send you the forgotten password to your email
                address by sending your username which is your registered email address to the admin forgot password service.
                If your are already registered as an admin of hSenid Student Turf, then your password will be received to the above
                email address. If you are not an admin, please request to the available admin to add you as an admin.
            </span>
        </div>
        <div class="span4">
            <form method="post" class="form-signin" action="forgot_password_check.php">
                <h4>Type your username and send</h4>
                <label>
                    <input type="text" name="email" class="input-block-level" placeholder="Email address"/>
                </label>

                <div>
                    <button type="submit" class="btn btn-small btn-success">Send</button>
                </div>
                <?php if (isset($_SESSION['email'])) { ?>
                    <div class="padding-top-10">
                        <span class="text-warning"><?php echo $_SESSION['email'] ?></span>
                    </div>
                <?php }?>
            </form>
        </div>
    </div>
</div>