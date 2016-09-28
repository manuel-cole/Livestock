<?php 
session_start(); 
	$email = $_SESSION['email'];

if ( isset($_SESSION['email']) ) {
	$email = $_SESSION['email'];    
 } else {
     // got a problem, deal with it here
	 header('Location: login.php');
	 
 }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Livestock Management System</title>
	<style>
.foo {
  width: 200px;
  height: 200px;
  overflow-y: hidden;
}
</style>
</head>

<frameset scrolling="no" rows="9%,84%,7%" framespacing="30" frameborder="yes" border="1" bordercolor="#E6E6E6">
  <frameset scrolling="no">
  <frame scrolling="no" seamless="seamless" class="foo" name="top" src="header.php"/> </frameset>
<frameset scrolling="no" cols="20%,80%"  frameborder="yes"  >

  <frame class="foo" scorlling="no" seamless="seamless" noresize="noresize" name="accod" src="main_menu.php" />
  <frame scrolling="yes" src="mainhomepage.php" name="main" />
 
    </frameset>
	<frameset >
<frame  scrolling="no" seamless="seamless" class="foo" name="foot" src="footer.php" />
 </frameset>  </frameset> 
   <noframes>
   </noframes>

</html>
