 <?php
include 'db.php';
// Escape all $_POST variables to protect against SQL injections
error_reporting(E_ERROR | E_PARSE);
$stmt = $mysqli->prepare("INSERT INTO customer_details (customer_name,email_id,primary_contact_no,address,destination_address,date,trip_type,car_type,created_date)
   VALUES (?, ?,?, ?, ?, ?,?,?,?)");
$stmt->bind_param("sssssssss",$customer_name,$email_id,$primary_contact_no,$address,$update_destination_address,$date,$trip_type,$car_type,$createdDate);
$updated_customer_detail = $_POST['updated_data'];
$customer_name = $updated_customer_detail['update_customerName'];
$email_id = $updated_customer_detail['update_emailID'];
$primary_contact_no = $updated_customer_detail['update_contact'];
$address = $updated_customer_detail['address'];
$date = $updated_customer_detail['pickupDateTime'];
$trip_type = $updated_customer_detail['requestType'];
$car_type = $updated_customer_detail['carType'];
$update_destination_address=$updated_customer_detail['destinationAddress'];
$createdDate = date_create()->format('Y-m-d');
$validUser = $_POST['flag'];
$myObj = new stdClass();



if($stmt->execute())
{
    $myObj->flag = "success";
    $myObj->code = 1000;
    
}
else {
    $myObj->flag = "failed";
    $myObj->code = 0000;
}
echo json_encode($myObj);
return json_encode($myObj);
$stmt->close();
$mysqli->close();

// }
?>