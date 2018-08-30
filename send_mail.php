<?php
require_once 'PHPMailerAutoload.php';

if($_POST['isCabrequest'])
{
    $updated_customer_detail = $_POST['updated_data'];
    $validUser = $_POST['flag'];
    
    $updated_customer_detail = $_POST['updated_data'];
    $customer_name = $updated_customer_detail['update_customerName'];
    $email_id = $updated_customer_detail['update_emailID'];
    $primary_contact_no = $updated_customer_detail['update_contact'];
    $address = $updated_customer_detail['address'];
    $date = $updated_customer_detail['pickupDateTime'];
    $trip_type = $updated_customer_detail['requestType'];
    $car_type = $updated_customer_detail['carType'];
    $update_destination_address="--";
    if($updated_customer_detail['destinationAddress']!=="")
    {
    $update_destination_address=$updated_customer_detail['destinationAddress'];
        
    }


    $email_body= "Dear Team,<br><br>".$customer_name.
    " has submitted a booking request. Below are the booking details,<br><br>".
    "<b>Email Id:</b> ".$email_id."<br><br>".
    "<b>Contact:</b> ".$primary_contact_no."<br><br>".
    "<b>Address</b> ".$address."<br><br>".
    "<b>Car type</b> ".$car_type."<br><br>".
    "<b>Trip Type:</b> ".$trip_type."<br><br>".
    "<b>Date:</b> ".$date."<br><br>".
    "<b>Destination Address:</b> ".$update_destination_address."<br><br>";
    $email_body.="<br>Click the link below to see the cab requests,".
     "<br><br>http://www.sainacalldrivers.com/login.php";
}

$mail = new PHPMailer;
$mail->SMTPDebug = 3;
$mail->isSMTP();
$mail->Host = 'sg2plcpnl0046.prod.sin2.secureserver.net';
$mail->SMTPAuth = true;
$mail->Username = 'c03vkdujp9us'; // This was my GoDaddy cPanel username
$mail->Password = 'Doodle@123'; // And my GoDaddy cPanel password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('sainacalldrivers@gmail.com.', 'Admin');
$mail->addAddress('sainacalldrivers@gmail.com');
$mail->isHTML(true);

$mail->Subject = 'Saina Call Drivers';
$mail->Body = $email_body;

if(!$mail->send()) {
echo 'Message could not be sent.';
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent';
}
if($email_id)
{

$customerMail = new PHPMailer;
$customerMail->SMTPDebug = 3;
$customerMail->isSMTP();
$customerMail->Host = 'sg2plcpnl0046.prod.sin2.secureserver.net';
$customerMail->SMTPAuth = true;
$customerMail->Username = 'c03vkdujp9us'; // This was my GoDaddy cPanel username
$customerMail->Password = 'Doodle@123'; // And my GoDaddy cPanel password
$customerMail->SMTPSecure = 'tls';
$customerMail->Port = 587;

$customerMail->setFrom('sainacalldrivers@gmail.com.', 'Admin');
$customerMail->addAddress($email_id); // Add a recipient, Name is optional
$customerMail->isHTML(true);

$customerMail->Subject = 'Saina Call Drivers';
    $email_body= "Dear ". $customer_name  .",<br><br>Thank you for choosing us. Your request has been successfully received. Our team will get in touch with you shortly.<br><br> Incase of any complaints please call us at 044-48677666.<br><br>Regards,<br>Saina Call Drivers";
 $customerMail->Body = $email_body;
 
 if(!$customerMail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $customerMail->ErrorInfo;
    } else {
    echo 'Message has been sent';
    }
}

?>