<?php
/**
 * Created by Jonathan.
 */
    session_start();
    $email = $_SESSION['email'];

if ( isset($_SESSION['email']) ) {
    $email = $_SESSION['email'];    
 } else {
     // got a problem, deal with it here
     header('Location: login.php');
     
 }

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

$add_poultry = "add_poultry";

// escape variables for security
$tag_no = mysqli_real_escape_string($con, $_POST['tag_no']);
$origin = mysqli_real_escape_string($con, $_POST['origin']);
$describ = mysqli_real_escape_string($con, $_POST['describ']);
$sex = mysqli_real_escape_string($con, $_POST['sex']);
$age = mysqli_real_escape_string($con, $_POST['age']);
$status = mysqli_real_escape_string($con, $_POST['status']);


// checks if the email address is alredy registered
$tag_no_check = $_POST['tag_no'];
$check = mysqli_query($con, "SELECT tag_no FROM $add_poultry WHERE tag_no = '$tag_no_check'") or
die(mysqli_error());
$check2 = mysqli_num_rows($check);

//if the name exists it gives an error
if ($check2 != 0) 
{
	?>
		<script type="text/javascript">
			alert("The tag number <?php echo $_POST['tag_no']; ?> is already recorded.");
			history.back();
		</script>
	<?php
}


$sql="INSERT INTO add_poultry(tag_no, Origin, Describ, Sex, Age, Status, Admin)
VALUES ('$tag_no', '$origin', '$describ', '$sex', '$age', '$status', '$email')";



if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "1 record added";
header('Location: thankyou.php');

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

                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-2 col-sm-2 col-xs-2">
                        </div>
                        <div class="col-md-10 col-sm-12 col-xs-10">
                            <h4 class="pTitle">Enter details for the Poultry bird and submit</h4>
                            </div>
                    </div>


                </div>
                <div class="panel-body">
                    <form name="login" action="" accept-charset="utf-8" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group ">
                                <input class="form-control" placeholder="Tag Number" name="tag_no" type="text" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Origin" name="origin" type="text"  required>
                            </div>
							<div class="form-group">
                                <input class="form-control" placeholder="Description" name="describ" type="text" required>
                            </div>
							<div class="form-group">
                                <input class="form-control" placeholder="Sex" name="sex" type="text" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Age" name="age" type="text" value="" required>
                            </div>
							<div class="form-group">
                                <input class="form-control" placeholder="Status" name="status" type="text" value="" required>
                            </div>
                            
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" name="btnSubmit" class="btn btn-lg btn-success btn-block" ><i class="glyphicon glyphicon-ok"></i> Submit</button>
                        </fieldset>
                    </form>

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
