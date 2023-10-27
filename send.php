<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;

require 'sendemail/src/PHPMailer.php';
require 'sendemail/src/Exception.php';
require 'sendemail/src/SMTP.php';

if(isset($_POST["Mail"])){


$mail = new PHPMailer(true);


$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->SMTPAuth = true;

$mail->Username = 'sjdheepthi@gmail.com'; // Your gmail
$mail->Password = 'lkdxtjappoujoexv'; // Your gmail app password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('sjdheepthi@gmail.com'); // Your gmail
$mail->addAddress($_POST["email"]);
$mail->isHTML(true);
$mail->Subject = $_POST["name"]; 
$mail->Body = $_POST["issue"];
$mail->SMTPDebug = 2;
$mail->send();
echo "<script> 
alert('Sent successfully');
document.location.href = 'adminaction from.php'
</script>";

}
else{
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

}


?>