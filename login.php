<?php
/**
 * Created by Jonathan.
 */

require('dbPlayer.php');
require('sessionManager.php');
$msg="";
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(0);
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["btnLogin"])) {

$email = $_POST['email'];
$password = md5 ($_POST['password']);
//$access_level = $_POST['access_level'];
     
$conn = mysqli_connect('localhost', 'livestock', 'livestock', 'livestock');
     
$email = mysqli_real_escape_string($conn, $email);
//$access_level = mysqli_real_escape_string($conn, $access_level);
$query = "SELECT *
FROM users
WHERE email = '$email';";
     
$result = mysqli_query($conn, $query);
     
if(mysqli_num_rows($result) == 0) // User not found. So, redirect to login_form again.
{
    ?>
        <script type="text/javascript">
            alert("The email address or password is invalid.");
            history.back();
        </script>
    <?php
}
     
$_SESSION['name'] = $name;
$_SESSION['loginId'] = $login_id;
$_SESSION['email'] = $email;
$_SESSION['telephone'] = $telephone;

$userData = mysqli_fetch_array($result, MYSQL_ASSOC);

$_SESSION['name'] = $name = $userData['name'];
$_SESSION['loginId'] = $login_id = $userData['loginId'];
$_SESSION['email'] = $lname = $userData['email'];
$_SESSION['telephone'] = $telephone = $userData['telephone'];

//Check to see if user is an employee or just a member
$generaluserCheck = mysqli_query($conn, "SELECT * FROM users WHERE (email = '$email') AND (loginId = 'user')");
$adminCheck = mysqli_query($conn, "SELECT * FROM users WHERE (email = '$email') AND (loginId = 'admin')");
     
if($password == $userData['password'] && mysqli_num_rows($generaluserCheck) == 1) // Incorrect password. So, redirect to login_form again.
{
    $_SESSION['name'] = $name;
    $_SESSION['loginId'] = $login_id;
    $_SESSION['email'] = $email;
    $_SESSION['telephone'] = $telephone;
    header('Location: mainpage.php');
}
        
else if($password == $userData['password'] && mysqli_num_rows($adminCheck) == 1){
    header('Location: adminpage.php');
}
else {
        ?>
        <script type="text/javascript">
            alert("The email address or password is invalid.");
            history.back();
        </script>
    <?php
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

    <title>Livestock</title>

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

        <div class="col-md-4 col-md-offset-4">

            <div class="login-panel panel panel-default">

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10 col-sm-12 col-xs-10">
                            <h5 class="pTitle">Livestock Management</h5>
                            </div>
                    </div>


                </div>
                <div class="panel-body">
                    <form name="login" action="" accept-charset="utf-8" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email/Login ID" name="email" type="text" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                                <!--<a href="forget.html" class="red pull-right">Forget Password</a>-->
                                <label id="loginMsg" class="red"><?php echo $msg ?></label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
							<form name="btnlogin" action="login.php" accept-charset="utf-8" method="post" enctype="multipart/form-data">
                                                            <div class="" >
								<button type="submit" name="btnLogin" class="btn btn-lg btn-success btn-block" ><i class="glyphicon glyphicon-log-in"></i> Login</button></div>
							</form></br>
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
