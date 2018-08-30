<?php
session_start();
include('db.php');
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);
$message="";
if(!empty($_POST["login"])) {
    if (empty($_POST['user_name']) || empty($_POST['password'])) {
        $error = "Username or Password is invalid";
    }
    $username= $_POST["user_name"];
    $password= $_POST["password"];
    $password=md5($password);
    $stmt = $mysqli->prepare( "SELECT * from admin_details  WHERE username=? and password=?");
    $stmt->bind_param("ss", $username,$password);
    $stmt->execute();
    $result = $stmt->fetch();
                                                    
    if($result) {
        $_SESSION["user_id"] = $username;
        header("location:admin_page.php");
	} else {
	$message = "Invalid Username or Password!";
	}
}
?>

<html>
<head>
  <meta charset="utf-8">
  <title>Saina Call Drivers</title>
  <meta name="description" content="Saina Call drivers, the brain child of our Managing Directors Mr. M Prosanth Kumar and Mr.P.C Suresh was established on June 17 2018. Our objective is to enable a proper work life balance and a happy environment for our drivers. We understand the ground reality the drivers of today face and we ensure they are happy.">
  <meta name="keywords" content="book Call Drivers, cars, rent cars, rent drivers, doorstep, doorstep pickup, doorstep drop, hourly driver available, best support, saina call drivers, taxi, call taxi, cab, pickup, drop">
  <meta name="author" content="sainacalldrivers@gmail.com">
  <!-- Brand Image -->

  <!-- Favicons -->
  <link href="img/logo.jpg" rel="icon">
  <!-- Brand Image -->
  <!-- <link rel="icon" href="img/logo.png"> -->
  <!-- Bootstrap and core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Custom styles for this template -->
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css">
  <!-- Data Tables -->
  <!--  My Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>
 <!-- About us -->
 <body class="login-bg">
 <div >
      <div class="container">

        <div class="row">
          <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <div class="wow fadeIn" data-wow-delay="600ms">
              <div class="card-container login-container">
                <h2 class="text-center">LOGIN</h2>
                <br>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" id="frmLogin">
                  <div class="form-group">
				          <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>	
                    <label for="username"><b>Username</b></label>
                    <input type="text" class="form-control" name="user_name" placeholder="Username" required>
                    <div class="clearfix"></div>
                    <div class="text-danger errorDivUsername" role="alert">
                      Please enter username.
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <div class="text-danger errorDivPassword" role="alert">
                      Please enter the Password.
                    </div>
                    <div class="text-right forgot-password">
                      <small>Forgot Password?</small>
                    </div>
                  </div>
                  <br/>
                  <button type="submit" name="login" value="Login" class="btn btn-default btn-lg wow fadeIn width-100">LOGIN</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>      
</form>
</body>
</html>
