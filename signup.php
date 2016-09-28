<?php
/**
 * Created by Emmanuel.
 */
$msg="";
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(0);
ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["btnSubmit"])) {

        $con=mysqli_connect("localhost","livestock","livestock","livestock");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$admin = "admin";

// escape variables for security
$name = mysqli_real_escape_string($con, $_POST['name']);
//$organization = mysqli_real_escape_string($con, $_POST['organization']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$telephone = mysqli_real_escape_string($con, $_POST['telephone']);
$password = mysqli_real_escape_string($con, $_POST['password']);


// checks if the email address is alredy registered
$emailcheck = $_POST['email'];
$check = mysqli_query($con, "SELECT email FROM $admin WHERE email = '$emailcheck'") or
die(mysqli_error());
$check2 = mysqli_num_rows($check);

//if the name exists it gives an error
if ($check2 != 0) 
{
	?>
		<script type="text/javascript">
			alert("The email address <?php echo $_POST['email']; ?> is already registered.");
			history.back();
		</script>
	<?php
}

$password = md5($password);

$sql="INSERT INTO admin(name, email, telephone, password, user)
VALUES ('$name', '$email', '$telephone', '$password', 'user')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";
echo "<a href='login.php'>Login to Activate your account";

mysqli_close($con);

require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->Host     = "smtp.gmail.com"; // SMTP server
 
$mail->From     = "jonathan@233apps.com";
$mail->AddAddress("shandonjoe@gmail.com");
$mail->FromName = "Hall Reservation System Admin"; 
$mail->Subject  = "New User Registered";
$mail->Body = "Create new account for , Name = " . $name . " ||  Email = " . $email;
$mail->WordWrap = 50;
 
if(!$mail->Send()) {
echo 'Message was not sent.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo 'Message has been sent.';
}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HRS</title>

    <!-- Bootstrap Core CSS -->
    <link href="./dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="./dist/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="./dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="./dist/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./dist/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="./dist/css/appStyle.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


<div class="container">
    <div class="row">

        <div class="col-md-6 col-md-offset-3">

            <div class="login-panel panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-2">
                           <a href="index.html" target="_self"><img src="./dist/images/logo.png" alt="Logo"></a>
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-10">
                            <h4 class="pTitle">Hall Reservation System</h4>
                            </div>
                    </div>


                </div>
                <div class="panel-body">
                    <form name="login" action="signup.php" accept-charset="utf-8" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group ">
                                <input class="form-control" placeholder="Full Name" name="name" type="text" autofocus required>
                            </div>
							<div class="form-group">
                                <input class="form-control" placeholder="E-mail" name="email" type="email" required>
                            </div>
							<div class="form-group">
                                <input class="form-control" placeholder="Telephone" name="telephone" type="number" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" required>
                            </div>
                            
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" name="btnSubmit" class="btn btn-lg btn-success btn-block" ><i class="glyphicon glyphicon-ok"></i> Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="./dist/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="./dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="./dist/js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript
<script src="./dist/js/raphael-min.js"></script>
<script src="./dist/js/morris.min.js"></script>
<script src="./dist/js/morris-data.js"></script>
 -->
<!-- Custom Theme JavaScript -->
<script src="./dist/js/sb-admin-2.js"></script>

</body>

</html>
