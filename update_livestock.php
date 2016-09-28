<?php 
ob_start();
session_start();

if ( isset($_POST['updateProfile']) ) {

	//$type = $_POST['type'];
  $tag_no = $_POST['tag_no'];
 // $Npassword = $_POST['Npassword'] ;
  $Norigin = $_POST['Norigin'] ;
  $Ndescrib = $_POST['Ndescrib'] ; 
  $Nsex = $_POST['Nsex']; 
  $Nage = $_POST['Nage']; 
  $Nstatus = $_POST['Nstatus']; 
  //$date = $_POST['date']; 

}else{

}
$con=mysqli_connect("localhost","livestock","livestock","livestock");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
  //$name = $_SESSION['name'] = $Nname;
  //$organization = $_SESSION['organization'];
 // $password = $_SESSION['password'];
  $email = $_SESSION['email'];
  $telephone = $_SESSION['telephone']; 
  $tag_no = $_SESSION['tag_no']; 

$livestock = "livestock";
 $tag_no = $_POST['tag_no'];
 // $Npassword = $_POST['Npassword'] ;
  $Norigin = $_POST['Norigin'] ;
  $Ndescrib = $_POST['Ndescrib'] ; 
  $Nsex = $_POST['Nsex']; 
  $Nage = $_POST['Nage']; 
  $Nstatus = $_POST['Nstatus']; 
//$hashPassword = md5($password);
// escape variables for security

$sql = " UPDATE livestock 
SET origin = '$Norigin',
    describ = '$Ndescrib', 
    sex = '$Nsex',
    age = '$Nage',
    status = '$Nstatus'
    WHERE tag_no = '$tag_no' ";

if (!mysqli_query($con, $sql)) {
  die('Error: ' . mysqli_error($con));
}
echo "";

mysqli_close($con);
?>
 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sambawa Farms</title>

    <!-- Bootstrap core CSS -->
    <link href="site/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="site/css/lightbox.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      
    <!-- Custom styles for this template -->
   <!-- <link href="site/css/jumbotron.css" rel="stylesheet">-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="site/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
body {
    background-color: #EEEEEE;
}
  .row {
    float: center;
    text-align: right;
    width: 65%;
}

</style>  </head>

  <body>
   

    <!-- Main jumbotron for a primary marketing message or call to action -->
 
    <br><br><br>
   
    <div class="container">
     	<div class="alert alert-success">
  			<p><center><strong>Success!</strong></center></p>
        <p><center>You have successfully updated the livestock.</center></p>
  			<a class="btn btn-success btn-xs" href="adminpage.php" target="_parent">Go Back</a>
		</div>
     
    </div> <!-- /container -->
    
      

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="site/js/jquery-1.11.0.min.js"></script>
	<script src="site/js/lightbox.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="site/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="site//js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>