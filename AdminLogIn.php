<?php

require 'connection.php'; 
require 'AlertMsg.php';

if(isset($_POST['Login'])){

	$Email=$_POST['Email'];
	$PASSWORD=$_POST['PASSWORD'];
		
	$result = $conn->query("select * from super_user where EMAIL='$Email' AND PASSWORD='$PASSWORD' ");
	
	$row = $result ->fetch_array(MYSQLI_BOTH);
	
	if($row["SUPERID"]==0){
		phpAlert(   "Error While Logging!!\\n\\n Please Check Your Email ID & Password And Try Again!!"   );
	}else{
	
	session_start();
	
	$_SESSION["SUPERID"]= $row["SUPERID"];

	header('Location: AdminAccount.php');
	}
}
else{
	
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="css/Layout.css" rel="stylesheet" type="text/css" />
<link href="css/Menu.css" rel="stylesheet" type="text/css" />
<link href="css/LeftSidePanel.css" rel="stylesheet" type="text/css" />
<link href="css/botton.css" rel="stylesheet" type="text/css" />
<link href="css/dropdown.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
.StyleTextField{}.StyleTextField1 {}
</style>
<title>Prison Management</title>
</head>

<body>
	<div id="Holder">
	  <div id="Navbar">
  <nav>			<ul>
					<li><a href="Register.php" title="New Registration">New Registration</a></li>
					<li><a href="LogIn.php">visitor</a></li>
					<li><a href="ContactUS.php" target="contact us">Contact Us</a></li>	
					
					<div class="dropdown">
								  <button class="dropbtn">Employee Login⮟</button>
								  <div class="dropdown-content">
									<a href="AdminLogIn.php">Admin</a>
									
								</div>
								</div>
					<li id="Logo"><a href="index.php" title="PRISON MANAGEMENT">HOME</a></li>
				</ul>
			</nav>
		</div>
	  <div id="Content">
	    <form name="form1" method="post" action="">
				  <table width="100%" cellpadding="11px">
				    <tbody>
				      
				      <tr>
				        <td><form><table width="39%" align="center" cellpadding="11px">
						<tbody>
							<tr style="text-align: center; font-size: 36px; color: #666666;">
							  <td colspan="2">LOGIN FOR ADMIN</td>
						  </tr>
							<tr>
							  <td width="33%"><blockquote>
								<p style="text-align: center">Email:</p>
								</blockquote></td>
							  <td width="67%"><input name="Email" type="email" autofocus="autofocus" required="required" class="StyleTextField" id="Email"></td>
							</tr>
							<tr>
							  <td><blockquote>
								<p style="text-align: center">Password:</p>
							  </blockquote></td>
							  <td><input name="PASSWORD" type="password" required="Pequired" class="StyleTextField" id="PASSWORD"></td>
							</tr>
							<tr>
							  <td height="58" colspan="2" style="text-align: center"><button class="button" style="vertical-align:middle" name="Login" type="submit" id="Login" value="Login"><span>Login </span></button></td>
						    </tr>
						  </tbody>
						</table>
						</form>
	  </div>
	  <div id="Footer"></div>
	  
	</div>
	
</body>
</html>
