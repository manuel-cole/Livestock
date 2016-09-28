<?php 
ob_start();
session_start();

if(isset($_POST['View_livestock'])){
    $view = $_POST['view'];
}
//$region_name = $_POST['region_name']; 
$con=mysqli_connect("localhost","livestock","livestock","livestock");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$sql="SELECT * FROM livestock WHERE type = '$view' ";

$records=mysqli_query($con,$sql);

$userData = mysqli_fetch_array($records, MYSQL_ASSOC);

$_SESSION['type'] = $view;
//$_SESSION['d'] = $type = $userData['type'];

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
 #actionButton{
    padding-top: 80px;
 }
 #search {
    float: right;
    margin-top: 9px;
    width: 250px;
}

.search {
    padding: 5px 0;
    width: 230px;
    height: 30px;
    position: relative;
    left: 10px;
    float: right;
    line-height: 22px;
}

    .search input {
        position: absolute;
        width: 0px;
        float: right;
        margin-left: 210px;
        -webkit-transition: all 0.7s ease-in-out;
        -moz-transition: all 0.7s ease-in-out;
        -o-transition: all 0.7s ease-in-out;
        transition: all 0.7s ease-in-out;
        height: 30px;
        line-height: 18px;
        padding: 0 2px 0 2px;
        border-radius:1px;
    }

        .search:hover input, .search input:focus {
            width: 200px;
            margin-left: 0px;
        }

.btn1 {
    height: 30px;
    width: 90px;
    position: absolute;
    right: 0;
    top: 5px;
    border-radius:1px;
    float: right;
}
.container2{
    padding-top: 60px;
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
    <div class="container2">
       <form name="SearchTag" method="POST" action="update_livestockProcess.php">
        <div class="search">
            <input name="SearchTag" type="number"  class="form-control input-sm" maxlength="80" placeholder="Enter Tag Number" />
            <button name="update" style="float: right;" type="submit" class="btn1 btn-primary">Update Livestock</button>
        </div>
        </form>
    </div>
    
 <div class="row">
     <form id="form1" action="" method="post">
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

    $result = mysqli_query($con,"SELECT * FROM livestock WHERE type = '$view' ");

    $count = mysqli_num_rows($result);
    // $livestock = $_POST['livestock'];
    $view = $_POST['view'];
if(mysqli_num_rows($result) == 0) // No records found.
{
    ?>
        <script type="text/javascript">
            alert("No Records found for <?php echo "$view"; ?>.");
            history.back();
        </script>
    <?php
}

echo "<h3><center>Records of livestock on $view </center></h3><br><br>";

while($row=mysqli_fetch_array($result)){
    $id = $row['id'];
    
    ?>
    <tr>
            
            <td><input style="width: 100px" type="" name="type[]" value="<?php echo $row['type'];?>" readonly></label></td>
            <td><input type="" name="tag_no[]" value="<?php echo $row['tag_no'];?>" readonly></label></td>
            <td><input style="width: 100px" type="" name="origin[]" value="<?php echo $row['origin'];?>" readonly></label></td>
            <td><input style="width: 80px" type="" name="describ[]" value="<?php echo $row['describ'];?>" readonly></label></td>
            <td><input style="width: 60px" type="" name="sex[]" value="<?php echo $row['sex'];?>" readonly></label></td>
            <td><input style="width: 85px" type="" name="age[]" value="<?php echo $row['age'];?>" readonly></label></td>            
            <td><input type="" name="status[]" value="<?php echo $row['status'];?>" readonly></label></td>
            <td><input style="width: 100px" type="" name="date[]" value="<?php echo $row['date'];?>" readonly></label></td>
    </tr>
    
  
    <?php   } //end of while loop ?>
        
    </tbody>
</table> 
    

    <div  id="actionButton">

          <!-- <center><a name="updateProfile" href="#myModal" class="btn btn-success" data-toggle="modal" data-target="#myModal" >Update Livestock</a></center>-->



           <!--<a class="btn btn-link btn-block" onclick="myFunction()">Print this page</a>-->
           <a class="btn btn-link btn-block" href="" onclick="myFunction()">Print this page</a>  
        </div>
      </form>
        </div>
    
           
    <!--<button id="cmd">generate PDF</button>-->
        </div></div>
    
    
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
  </script>--><script>
$(document).ready(function(){
       $("#myBtn").click(function(){
        $("#myModal").modal({backdrop: "static"});
    });
});
</script>
    <script src="js/main.js"></script>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/lightbox.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
