<?php ?>

<div class="container">

    <div class="row-fluid">
        <div class="span8 text-justify padding-10">
            Hi...! Welcome to the hSenid Student Turf admin panel. As an admin user, you can view all the details of
            registered student-turf community people and create new admin users for the admin purposes. For login as an
            admin user,
            your email address should be in admin permission list, else you have to request for the admin permission by
            requesting to the available admin user. Only already registered admins can add another admin by login to
            their admin account.
            <br/>
            <br/>
            If your have forgotten your password, then use forgot password service to received your lost password.
        </div>
        <div class="span4">
            <form method="post" class="form-signin" action="login_check.php">
                <h4>Please sign in</h4>
                <label>
                    <input type="text" name="username" class="input-block-level" placeholder="Email address"/>
                </label>
                <label>
                    <input type="password" name="password" class="input-block-level" placeholder="Password"/>
                </label>
                <!--        <label class="checkbox">
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>-->
                <div>
                    <button type="submit" class="btn btn-small btn-success"> Sign in</button>
                    <a class="pull-right padding-top-10" href="forgot_password.php">Need help on password..?</a>
                </div>
                <div id="message">
                    <?php if (isset($_SESSION['login_error'])) {
                        echo '<div class="alert alert-error padding-top-10">';
                        echo "<label>" . $_SESSION['login_error'] . "</label>";
                        echo '</div>';
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#message').show();
        setTimeout(function () {
            $('#message').hide();
        }, 1000 * 5);
    });
</script>