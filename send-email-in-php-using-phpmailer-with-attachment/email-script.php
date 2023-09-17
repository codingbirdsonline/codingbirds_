<?php
session_start();

require 'vendor/autoload.php'; // <-- keep this line if using composer
require '../../env-constants.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//require 'PHPMailer/src/PHPMailer.php'; //<-- Add these files manually if not using composer
//require 'PHPMailer/src/Exception.php'; //<-- Add these files manually if not using composer
//require 'PHPMailer/src/SMTP.php'; //<-- Add these files manually if not using composer

if(isset($_POST['sendMailBtn'])){
    $to = $_POST['to_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $attachment = $_FILES['attachment']['tmp_name'];
    $emailAttachment = null;
    if($attachment){
        $attachmentDir = 'attachment/';
        $emailAttachment = $attachmentDir. $_FILES['attachment']['name'];
        /**
         * Add file type validation
         */
        $fileExtension = pathinfo($emailAttachment,PATHINFO_EXTENSION);
        if(!in_array($fileExtension, array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'))){
            $_SESSION['error_message'] = "Invalid file type: Only pdf, doc, docx, jpg, png, jpeg are allowed";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
        move_uploaded_file($attachment, $emailAttachment);
    }
    sendEmail($to, $subject, $message, $emailAttachment);
    /**
     * Delete the uploaded attachment file after email send
     */
    @unlink($emailAttachment);
}

/**
 * Sends email with attachment
 * @param $to
 * @param $subject
 * @param $message
 * @param $emailAttachment
 */
function sendEmail($to, $subject, $message, $emailAttachment) {
    try {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = EMAIL_USERNAME;
        $mail->Password = EMAIL_PASSWORD;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        $mail->setFrom(EMAIL_USERNAME, EMAIL_NAME);
        $mail->addAddress($to, 'Joe User');

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body = $message;
        if($emailAttachment){
            $mail->addAttachment($emailAttachment);
        }
        $mail->send();
        $_SESSION['success_message'] = "Email Message has been sent successfully";
    }catch (Exception $e){
        $_SESSION['error_message'] =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
