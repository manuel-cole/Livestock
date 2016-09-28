<?php 
ob_start();
session_start();

$type = $_SESSION['type'];

if(isset($_POST['update'])){
    $tag_no = $_POST['SearchTag'];
}
$type = $_SESSION['type'];
$_SESSION['tag_no'] = $tag_no;


//$region_name = $_POST['region_name']; 
$con=mysqli_connect("localhost","livestock","livestock","livestock");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$sql="SELECT * FROM reservation WHERE DATE(date) = CURDATE() ";
$sql ="SELECT *
FROM livestock
WHERE type = '$type' AND tag_no = '$tag_no' ";

$records=mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sambawa Farms.</title>
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />

     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<style>
	.roww {
    float: center;
    text-align: right;
    width: 65%;
}

 .container{
	padding-left: 30px;
	padding-bottom: 50px;
	float: left;      
 }

</style>
<script>
$( document ).ready(function() {
    $('#myModal').on('hidden.bs.modal', function () {
        $(this).removeData('bs.modal');
    });
	 $("#myBtn").click(function(){
        $("#myModal").modal({backdrop: "static"});
    });
});
</script>
  </head>

  <body id="target">
<script type="text/javascript">
    function submitForm(action)
    {
        document.getElementById('form1').action = action;
        document.getElementById('form1').submit();
    }
</script>

    <div class="container">
 <div class="row">
    <form id="form1" action="update_livestock.php" method="post">
    <table class="table table-striped table-hover table-bordered datatable">
    <thead style="background: #BFFF00; color: White;">
    
    <tr>
    <th style="color: #3b3b3b;">Livestock Type</th> 
    <th style="color: #3b3b3b;">Tag Number</th> 
    <th style="color: #3b3b3b;">Origin</th>
    <th style="color: #3b3b3b;">Description</th> 
    <th style="color: #3b3b3b;">Sex</th>
    <th style="color: #3b3b3b;">Age</th>
    <th style="color: #3b3b3b;">Status</th>
    <th style="color: #3b3b3b;">Date</th>
    </tr>
        </thead>
		
<tbody>       
    <?php

    $result = mysqli_query($con,"SELECT *
FROM livestock
WHERE type = '$type' AND tag_no = '$tag_no' ");

    $count = mysqli_num_rows($result);
   // $livestock = $_POST['livestock'];

echo "<h3><center>  $type</center></h3><br><br>";

while($row=mysqli_fetch_array($result)){
    $id = $row['id'];
	
	?>
    <tr>
            <td><input style="width: 100px" type="" name="type[]" value="<?php echo $row['type'];?>" readonly></label></td>
            <td><input type="" name="tag_no" value="<?php echo $row['tag_no'];?>" readonly></label></td>
            <td><input style="width: 100px" type="" name="Norigin" placeholder="<?php echo $row['origin'];?>" value="<?php echo $row['origin'];?>"></label></td>
            <td><input style="width: 80px" type="" name="Ndescrib" placeholder="<?php echo $row['describ'];?>" value="<?php echo $row['describ'];?>"></label></td>
            <td><input style="width: 60px" type="" name="Nsex" placeholder="<?php echo $row['sex'];?>" value="<?php echo $row['sex'];?>"></label></td>
            <td><input style="width: 85px" type="" name="Nage" placeholder="<?php echo $row['age'];?>" value="<?php echo $row['age'];?>"></label></td>            
            <td><input type="" name="Nstatus" placeholder="<?php echo $row['status'];?>" value="<?php echo $row['status'];?>"></label></td>
            <td><input style="width: 100px" type="" name="time[]" value="<?php echo $row['date'];?>" readonly></label></td>
    </tr>
    
    <?php	} //end of while loop ?>
       	
    </tbody>
</table> 
    

    <div  id="actionButton">

          <center><button name="updateProfile" type="submit" class="btn btn-success">Update Livestock</button></center>

           <!--<a class="btn btn-link btn-block" onclick="myFunction()">Print this page</a>-->
           <a class="btn btn-link btn-block" href="" onclick="myFunction()">Print this page</a>  
        </div>
      </form>
        </div>

           
	<!--<button id="cmd">generate PDF</button>-->
		</div>
	
	
<script>
function myFunction() {
    window.print();
}
</script>

 <!-- <script type="text/javascript">
$(function () {
  var specialElementHandlers = {
        '#editor': function (element,renderer) {
            return true;
        }
    };
 $('#cmd').click(function () {
        var doc = new jsPDF();
        doc.fromHTML($('#target').html(), 15, 15, {
            'width': 170,'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });  
});
  </script>-->
    <script src="js/main.js"></script>
    <script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
