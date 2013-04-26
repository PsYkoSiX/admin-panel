<?php
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . './error_log.txt');
error_reporting(E_ALL);
require("class.phpmailer.php");
class EmailSender
{
    public function sendEmail($receivers = array(), $subject, $body, $cc_list = array())
    {
        $mail = new PHPMailer();

        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->From = "malithn@9696.lk";
        $mail->FromName = "Student Turf Admin";
        $mail->Host = "smtp.gmail.com"; // specif smtp server
        $mail->SMTPSecure = "ssl"; // Used instead of TLS when only POP mail is selected
        $mail->Port = 465; // Used instead of 587 when only POP mail is selected
        $mail->SMTPAuth = true;
        $mail->Username = "malithn@9696.lk"; // SMTP username
        $mail->Password = 'm@litHni'; // SMTP password
        foreach ($receivers as $receiver) {
            if ($receiver != null && $receiver != '') {
                $mail->AddAddress($receiver); //replace myname and mypassword to yours
            }
        }
        foreach ($cc_list as $cc) {
            if ($cc != null && $cc != '') {
                $mail->AddCC($cc);
            }
        }
        $mail->AddReplyTo("students@hsenidmobile.com", "Student Turf Admin");
        $mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("c:\\temp\\js-bak.sql"); // add attachments
//$mail->AddAttachment("c:/temp/11-10-00.zip");

        $mail->IsHTML(true); // set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->Send()) {
            return true;
        } else {
            return false;
        }
    }
}