<?php
$con=mysqli_connect("localhost","livestock","livestock","livestock");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//Include database connection here
$id = $_GET["id"]; //escape the string if you like
$result = mysqli_query($con,"SELECT * FROM livestock WHERE id = '$id' ");
//$count = mysqli_num_rows($result); //Don't need to count the rows too
$row = mysqli_fetch_array($result); //Don't need the loop if you wana fetch only single row against id
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload()">&times;</button>
    <h4 class="modal-title"><center>Livestock Information</center></h4>
</div>
<div class="modal-body">
    <div class="col-md-6">
                <div class="form-group float-label-control">                      
                    <label for="">Name</label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['name'];?>" name="Nname" value="<?php echo $row['name'];?>">
                </div>
                <div class="form-group float-label-control">  
                    <label for="">Organization</label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['organization'];?>" name="Norganization" value="<?php echo $row['organization'];?>">
                </div>
                <div class="form-group float-label-control">  
                    <label for="">Telephone</label>
                    <input type="text" class="form-control" placeholder="<?php echo $row['telephone'];?>" name="Ntelephone" value="<?php echo $row['telephone'];?>">
                </div>
                <div class="form-group float-label-control">
                    <label for="">Email</label> 
                    <input type="text" class="form-control" placeholder="<?php echo $row['email'];?>" name="Nemail" value="<?php echo $row['email'];?>">
                </div> 
                
            </div>  
</div>
<div class="modal-footer">
<div class="form-group float-label-control">
                    <button class="btn btn-primary ladda-button" data-style="zoom-in" name="updateProfile" type="submit"  id="SubmitButton"  />Save Your Profile</button>
                    <a href="mainpage.php" class="btn btn-default ladda-button" target="_parent" data-style="zoom-in" name="cancelProfile" type="submit"  id="SubmitButton"  />Cancel</a>
                </div>
    <button type="button" class="btn btn-default" data-dismiss="modal" onClick="window.location.reload()">Close</button>
</div>
<script>
$(document).ready(function(){
       $("#myBtn").click(function(){
        $("#myModal").modal({backdrop: "static"});
    });
});
</script>
</body>
</html>