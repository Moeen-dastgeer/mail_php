<?php

$first_name = "Moeen";
$last_name = "Dastgeer";
$course = "Web Development";
$phone = "03434058227";
$email = "moeendastgir@gmail.com";
$DOB = "16/11/1993";
$cnic = "3530219558003";
$edu = "BSCS";
$obt_marks = 3.8;
$total_marks = 4.0;

// $first_name = $_POST['first_name'];
// $last_name = $_POST['last_name'];
// $email = $_POST['email'];
// $phone = $_POST['phone'];
// $division = $_POST['division'];
// $district = $_POST['district'];
// $cnic = $_POST['cnic'];
// $address = $_POST['address'];
// $gender = $_POST['gender'];
// $course = $_POST['course'];
// $dob = $_POST['dob'];
// $education = $_POST['education'];
// $pass_year = $_POST['pass_year'];
// $board = $_POST['board'];
// $institute = $_POST['institute'];
// $obt_marks = $_POST['obt_marks'];
// $total_marks = $_POST['total_marks'];

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';


//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.ficer.pk';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'moeen@ficer.pk';                     //SMTP username
    $mail->Password   = '4058227@Baba';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('moeen@ficer.pk');
    $mail->addAddress('moeen@ficer.pk');     //Add a recipient          

    // //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Application for Course Registration - $course";
    $mail->Body    = "<b>Dear Admin Office,</b><br><br>
    <p>I hope this email finds you well. My name is <b>$first_name $last_name</b>,
    I am writing to request registration for the following course(s) for the upcoming session</p><br>
    <b><ul><li>Course Title: $course </li></ul></b><br>
    Please find my personal details below for your reference:<br>
    <b><ul><li>Full Name: $first_name $last_name</li><li>Date of Birth: $DOB</li><li>CNIC: $cnic</li><li>Education: $edu</li><li>Obtained Marks: $obt_marks</li><li>Total Marks: $total_marks</li></ul></b>
    <p>I would be grateful if you could assist me with the registration process, or let me know if any further information or steps are required from my side.</p>
    <p>Thank you for your time and assistance. I look forward to your response.</p><br>Sincerely,<br>$first_name $last_name<br> $phone <br> $email";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}