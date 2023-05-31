<?php
require 'connection.php'; 
require 'AlertMsg.php';

session_start();
	
	if(isset($_SESSION["SUPERID"])){
		$a=$_SESSION["SUPERID"];
		$sqlname = "SELECT SUPER_NAME FROM super_user where SUPERID=$a";
		$resultname = mysqli_query($conn, $sqlname);
				}
		
	else{
		header('location: AdminLogIn.php');
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
.print{
	background-color:blue;
	color:white;
}
</style>
<title>Prison Managment</title>
</head>

<body>
		<div id="Holder">
<div id="Navbar">
	  <nav>
				<ul>
					<li><a href="AdminAccount.php" title="Logout">Back</a></li>
	    			<li id="Logo"><a href="AdminAccount.php" title="PRISON MANGEMENT">PRISON MANAGEMENT</a>		  		</ul>
  </nav>
	  <div id="Content">
			<div id="PageHeading"><h2>
  <?php
			if (mysqli_num_rows($resultname) > 0) {
		//output data of each row
		if($row = mysqli_fetch_assoc($resultname)) {	
					  		
			//echo $row["SUPER_NAME"];
			
		}}
			?>
	<button class="print" onClick="window.print();"><i class="fa fa-print"></i> Print</button>  
</h2>
    </div>
	
			<div>
		  <form action=""   method="post" >
			  <table cellpadding="0" id="customers">
  <tbody>
    <tr>
      <td colspan="9"><strong><em>
        <h3> All Visitors Requesting to visit Are As Below</h3></em></strong>
	</td>
	
    </tr>
    <tr>
      <td>VISITOR ID</td>
      <td >NAME</td>
	  <td>PRISONER ID</td>
      <td >Relation</td>
      <td >DATE</td>
      <td>Mobile</td>
	  <td >Status</td>
	  <td >comment</td>
    
      </tr>
    
    <?php
	 $res=mysqli_query($conn,"select * from permission ORDER by date DESC");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
    <tr class="StyleTextField">
      <td><?php echo $row["UserID"]; ?></td>
      <td><?php echo $row["Fname"]; ?></td>
      <td><?php echo $row["PRISONER_ID"]; ?></td>
      <td><?php echo $row["Relation"]; ?></td>
      <td><?php echo $row["date"]; ?></td>
      <td><?php echo $row["MOBILE"]; ?></td>
	  <td><?php echo $row["ACCESS"]; ?></td>
	  <td><?php echo $row["comment"]; ?></td>
    
      </tr>
    
    
    <?php 
	  }
	  ?>
  </tbody>
</table>

			  </form>
	    </div>
	  </div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
