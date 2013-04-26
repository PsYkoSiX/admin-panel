<?php
session_start();
$email = '';
$email = $_SESSION['email_list'];
//    $email_display = "Selected users count [" . $_GET['userCount'] . "]";
?>
<div>
    <div class="well well-small">
        <span class="width-98">Email sending to : <?php echo $email;?> </span>
    </div>
    <div>
        <form method="post" action="email_sending_check_admin.php" name="email_send_form">
            <input type="hidden" name="email" value="<?php echo $email?>"/>
            <input type="text" class="width-98" name="subject" placeholder="Email subject"
                   onchange="disableBtn(this, document.email_send_form.sendBtn)"
                   onkeyup="disableBtn(this, document.email_send_form.sendBtn)"
                   onkeydown="disableBtn(this, document.email_send_form.sendBtn)"/>
            <!--            <textarea class="width-535px" rows="10" name="emailBody" placeholder="Type your email body here"></textarea>-->
            <?php include 'emailEditor.html';?>
            <button type="submit" class="btn btn-mini btn-success pull-right" name="sendBtn" id="sendBtn"
                    disabled="disabled">Send
            </button>
        </form>
    </div>
</div>

<script type="text/javascript">
    function disableBtn(value, elementToDisable) {
        var elementValue = value.value;
        elementToDisable.disabled = elementValue == null || elementValue == '';
    }
</script>