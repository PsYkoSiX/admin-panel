<?php session_start(); ?>

<div id="message">
    <?php
    if (isset($_SESSION['email_send_error'])) {
        echo "<div class='alert alert-error'>" . $_SESSION['email_send_error'] . "</div>";
    }
    if (isset($_SESSION['email_send_success'])) {
        echo "<div class='alert alert-success'>" . $_SESSION['email_send_success'] . "</div>";
    }
    ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#message').show();
        setTimeout(function () {
            $('#message').hide();
        }, 1000 * 15);
    });
</script>