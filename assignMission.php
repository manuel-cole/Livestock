<?php
/**
 * Created by Jonathan.
 */

$msg="";
error_reporting(E_ALL ^ E_DEPRECATED);
error_reporting(0);
ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["btnSubmit"])) {

        $con=mysqli_connect("localhost","bootstrap","bootstrap","bootstrap");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$clerks = "troops";

// escape variables for security
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$othernames = mysqli_real_escape_string($con, $_POST['othernames']);
$sex = mysqli_real_escape_string($con, $_POST['sex']);
$age = mysqli_real_escape_string($con, $_POST['age']);
$height = mysqli_real_escape_string($con, $_POST['height']);
$telephone = mysqli_real_escape_string($con, $_POST['telephone']);
$maritalstatus = mysqli_real_escape_string($con, $_POST['maritalstatus']);
$status = mysqli_real_escape_string($con, $_POST['status']);
$rank = mysqli_real_escape_string($con, $_POST['rank']);


$sql="INSERT INTO troops(Firstname, Lastname, Othernames, Sex, Age, Height, Telephone, Maritalstatus, Status, Rank)
VALUES ('$firstname', '$lastname', '$othernames', '$sex', '$age', '$height', '$telephone', '$maritalstatus', '$status', '$rank')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";

mysqli_close($con);

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

    <title>File</title>

    <!-- Bootstrap Core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../dist/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../dist/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../dist/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../dist/css/appStyle.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
body{
 background-color: #878787;
        background-image: url("../assets/images/troops4.jpg");
    }
#pan{
    padding-top: 15px;
}
    
    </style>


</head>

<body>


<div class="container">
    <div class="row">

        <div class="col-md-6 col-md-offset-3" id="pan">

            <div class="panel panel-primary">
                <form method="post" >
                <div class="panel-footer">
                    <button class="btn btn-success" type="submit">Add</button>
                    <button class="btn btn-success" type="submit">Cancel</button>
                </div>
                </form>
            </div>
            
        </div>
    </div>
</div>


<!-- jQuery -->
<script src="../dist/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../dist/js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript
<script src="./dist/js/raphael-min.js"></script>
<script src="./dist/js/morris.min.js"></script>
<script src="./dist/js/morris-data.js"></script>
 -->
<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
