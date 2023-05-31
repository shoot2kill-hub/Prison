<?php
require 'connection.php'; 
require 'AlertMsg.php';

session_start();
	
	if(isset($_SESSION["UserID"])){
		$a=$_SESSION["UserID"];
		$NAME="SELECT Fname FROM user1 where UserID=$a";
		$result = mysqli_query($conn,$NAME);
	}
	else{
	header('location: LogIn.php');
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
<style type="text/css">.StyleTextField{}</style>
<title>Prison Visit Managment</title>
</head>

<body>
	<div id="Holder">
<div id="Navbar">
	  <nav>
				<ul>
					<li><a href="LogOut.php" title="Logout">Logout</a></li>
	    			<li><a href="UpdateAccount.php" title="My Info">My Info</a></li>
	    			<li id="Logo"><a href="Account.php" title="PRISON MANAGEMENT">PRISON VISIT MANAGEMENT</a>
	    		</ul>
  </nav>
</div>
	  <div id="Content">
			<div id="PageHeading">
			  <h1>Hello 
			  <?php
			if(mysqli_num_rows($result) > 0) {
		//output data of each row
		if($row = mysqli_fetch_assoc($result)) {	
					  		
			echo $row["Fname"];
		}}
			?></h1></div>
			<div id="contentLeft">
				<table width="100%" align="left" cellpadding="11px">
				  <tbody>
				    
				    
				    <tr>
			        <td><a href="Account.php" title="home">⟢ Home</a></td>
		          </tr>
				    
				    
				    <tr>
				      <td><a href="AccountGrants.php" title="Check Visit Status">⟢ <strong style="font-size: 18px; text-align: left;">⟢ Check Visit Status</strong></a></td>
			        </tr>
					<tr>
					<td><a href="registerview.php" title="Check Visit Status">⟢ <strong style="font-size: 18px; text-align: left;">View Prisoner ID</strong></a></td>
	                 </tr>
				     <tr>
			        <td height="500"></td>
		          </tr>
			      </tbody>
			  </table>
				<h2>&nbsp;</h2>
			</div>
			<div id="contentRight">
			 <table id="customers" width="104%" cellpadding="0">
  <tbody >
    <tr>
      <td colspan="8"><h3> HERE IS VISITTING DETAILS (Status: IN PROGRESS: MEANS REQUEST WAITING FOR APROOVAL , Status:ACCEPTED: MEANS REQUEST WAS  ACCEPTED AND USER ALLOWED TO VISIT , Status: IN REJECTED: REQUEST WAS NOT ACCEPTED AND USER DO NOT ALLOWED TO VISIT. Any Question Ask 0789582389)</h3></td>
      </tr>
    <tr>
      <td width="12%"><p>PRISONER</p>
        <p>ID</p></td>
      <td width="14%">PNAME</td>
	  <td width="14%">DOB</td>
      <td width="14%">CASE TYPE</td>
      <td width="15%"><p>PERMISSION ID</p></td>
      <td width="16%"><p>Visiter Name</p></td>
      <td width="11%"><p>Relation</p></td>
	  <td width="8%"><p>Visit Date</p></td>
	  <td width="8%"><p>Time</p></td> 
      <td width="10%"><p>Response/</p>
	  <p>Permission</p></td>
	  <td width="10%"><p>Comment</p>
	  
	  
    </tr>
    
    <?php
	  $b=$_SESSION["UserID"];
	 $res=mysqli_query($conn,"select prison1.PRISONER_ID ,prison1.PNAME,prison1.DOB,prison1.CASETYPE,permission.PERMISSIONID,permission.comment,permission.Fname,permission.Relation,permission.date,permission.ACCESS ,permission.time FROM prison1 INNER JOIN permission ON prison1.PRISONER_ID = permission.PRISONER_ID and permission.UserID='$b'");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
    <tr>
      <td><?php echo $row["PRISONER_ID"]; ?></td>
      <td><?php echo $row["PNAME"]; ?></td>
      <td><?php echo $row["DOB"]; ?></td>
	  <td><?php echo $row["CASETYPE"]; ?></td>
      <td><?php echo $row["PERMISSIONID"]; ?></td>
      <td><?php echo $row["Fname"]; ?></td>
      <td><?php echo $row["Relation"]; ?></td>
	  <td><?php echo $row["date"]; ?></td>
	  <td><?php echo $row["time"]; ?></td>
      <td><?php echo $row["ACCESS"]; ?></td>
	  <td><?php echo $row["comment"]; ?></td>
     
    </tr>
    
    
    <?php 
	  }
	  ?>
  </tbody>
</table>
			</div>
      </div>
	</div>
	
</body>
</html>