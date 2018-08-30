<?php
include 'db.php';
// Escape all $_POST variables to protect against SQL injections
error_reporting(E_ERROR | E_PARSE);
      
$stmt = $mysqli->prepare("INSERT INTO driver_details (name,email_id,primary_contact_no,secondary_contact_no,aadhar_no,driver_license_no,address,licence_img)
   VALUES (?, ?,?, ?, ?, ?,?,?)");
$stmt->bind_param("ssssssss",$driver_name,$email_id,$primary_contact_no,$sec_contact_no,$aadharno,$licenceno,$address,$licencepic);

$driver_name="";
$email_id="";
$primary_contact_no="";
$sec_contact_no="";
$address ="";
$aadharno="";
$aadharpic="";
$licenceno="";
$licencepic="";
$dDta="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driver_name = test_input($_POST['DriverName']);
    $email_id = test_input($_POST['DriverEmail']);
    $primary_contact_no = test_input($_POST['DriverpriContact']);
    $sec_contact_no = test_input($_POST['DriverSecContact']);
    $address = test_input($_POST['DriverAddress']);
   
    
    //college_addresso = test_input($_POST['address']);
    $aadharno = test_input($_POST['DriverAadharNo']);
    $aadharpic = $_FILES["aadharpic"]["name"];
    $aadharpic=imageFunctioner($aadharpic);
    $licenceno = test_input($_POST['DriverLicenseNo']);
    $licencepic = $_FILES["licensepic"]["name"];
    $licencepic=imageFunctioner($licencepic);
    
 }
 
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
  
function imageFunctioner($logo)
{
   
    //$logo=($_FILES['image']['tmp_name']);
    $logo= file_get_contents($logo);
    
    $logo= base64_encode($logo);
    return $logo;
}

       
//$data_to_database = json_decode(test_input($_POST);

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