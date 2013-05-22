<?php session_start(); ?>

<div id="header_message" class="container">
    <?php
    if (isset($_SESSION['header_message_error'])) {
        echo "<div class='alert alert-error'>" . $_SESSION['header_message_error'] . "</div>";
    }
    if (isset($_SESSION['header_message_success'])) {
        echo "<div class='alert alert-success'>" . $_SESSION['header_message_success'] . "</div>";
    }
    ?>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#header_message').show();
        setTimeout(function () {
            $('#header_message').hide();
        }, 1000 * 15);
    });
</script>