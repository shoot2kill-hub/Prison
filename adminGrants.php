<?php
require 'connection.php';
require 'AlertMsg.php';

session_id("session1");
session_start();

	if(isset($_SESSION["SUPERID"])){
		
		$a=$_SESSION["SUPERID"];
		$sqlname = "SELECT SUPER_NAME FROM super_user where SUPERID=$a";
		$resultname = mysqli_query($conn, $sqlname);
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
<style>
	.StyleTextField{}.StyleTextField1 {}
	.a{
		background-color:yellow;
	}
	.r{
		background-color:red;
	}
</style>
<title>Prison Management</title>
</head>

<body>
		<div id="Holder">
<div id="Navbar">
	  <nav>
				<ul>
					<li><a href="AdminLogOut.php" title="Logout">Logout</a></li>
	    			<li><a href="UpdateAdminAccount.php" title="My Info">My Info</a></li>
	    			<li id="Logo"><a href="AdminAccount.php" title="PRISON MANGEMENT">PRISON MANAGEMENT</a>		  		</ul>
  </nav>
	  <div id="Content">
			<div id="PageHeading"><h2>Hello 
  			<?php
			
				$sqlname = "SELECT SUPER_NAME FROM super_user";
				$resultname = mysqli_query($conn, $sqlname);
			if (mysqli_num_rows($resultname) > 0) {
		//output data of each row
		if($row = mysqli_fetch_assoc($resultname)) {	
					  		
			echo $row["SUPER_NAME"];
		}}
			?>
			</h2>
    		</div>
	<div id="contentLeft">
	  <table width="100%" cellpadding="11px">
	  <tbody>
			      <tr>
			        <td><a href="AdminAccount.php" title="home">⟢ Home</a></td>
		          </tr>
			      <tr>
			        <td><a href="adminAddPrisoner.php" title="add prisoner">⟢ Add New Prisoner</a></td>
		          </tr>
			      <tr>
			        <td><a href="adminViewPrisoner.php" title="view prisoner">⟢ View All Prisoner</a></td>
		          </tr>
			      <tr>
			        <td><a href="adminDelPrisoner.php" title="del prisoner">⟢ Del Prisoner</a></td>
		          </tr>
			     
			     
			    <tr>
				<td><a href="adminViewVisitor.php">⟢ Visit Report</a></td>
		        </tr>

				<tr>
			      <td><a href="adminreport.php">⟢Date Report</a></td>
		        </tr>
				
				<tr>
			      <td><a href="adminreportp.php">⟢ Prisoner Report</a></td>
		        </tr>
				
			    <tr>
			      <td><p><a href="adminGrants.php" title="grant permission to visitor">⟢ Grant a Permission to Visitor</a></p></td>
		        </tr>
		       
				<tr>
		        	<td><a href="adminaddvisitday.php">⟢ Add Visit Day</a></td>
		        </tr>
      </table>
			  <h2>&nbsp;</h2>
	</div>
			<div id="contentRight" align="center">
			  <form action="" style="StyleTextField" id="form1" name="form1" method="get" >
			  <table width="95%" cellpadding="0" id="customers">
  <tbody>
    <tr>
      <td align="center" height="30" colspan="9"><strong><em>
        <h3>All Visit Request wait for Approoval Are As Below</h3></em></strong></td>
    </tr>
    <tr>
      
      <td width="17%">NAME</td>
      <td width="13%">UserID</td>
      <td width="15%"><p>Relation</p></td>
	  <td width="18%"><p>Visitor Contact</p></td>
	  <td width="18%"><p>PRISONER_ID</p></td>
	  <td width="18%"><p>Date</p></td>
	  <td width="18%"><p>Time</p></td>
	  <td width="19%"><p>STATUS</p></td>
	  <td width="19%"><p>Action</p></td>
	  
	  </tr>
 
    <?php
	 
	
   $res=mysqli_query($conn,"select * from permission WHERE ACCESS='IN PROGRESS'");
	  while($row=mysqli_fetch_array($res))
	  {
	 ?>
    <tr class="StyleTextField">
      
      <td><?php echo $row["Fname"]; ?></td>
      <td><?php echo $row["UserID"]; ?></td>
      <td><?php echo $row["Relation"]; ?></td>
      <td><?php echo $row["MOBILE"]; ?></td>
	  <td><?php echo $row["PRISONER_ID"]; ?></td>
	  <td><?php echo $row["date"]; ?></td>
	  <td><?php echo $row["time"]; ?></td>
      <td><?php echo $row["ACCESS"]; ?></td>
       <?php echo "<td><a href=\"comment1.php?UserID=$row[UserID]\" onClick=\"return confirm('Are you sure you want to Accept the request?')\">ACCEPT</a> | <a href=\"comment2.php?UserID=$row[UserID]\" onClick=\"return confirm('Are you sure
		   you want to Reject the request?')\">REJECT</a></td>";?>
                  
                <?php } ?>   
	  
        
      
	</tr>
      <tr class="StyleTextField">
     
      
  	</tbody>
	</table>
</form>
	    </div>
	  </div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
