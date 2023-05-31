<?php
require 'connection.php'; 
require 'AlertMsg.php';
session_start();
if(isset($_SESSION["id"])){
	
}
?>

<?php
	
	
	$result = $conn-> query("select * from visiting_day order by date desc");
	
		$row = $result ->fetch_array(MYSQLI_BOTH);
	

	
	$_SESSION["date"]= $row['date'];
	
?>

<?php
	if(isset($_POST['add'])){
		$_UpdateSname = $_POST['date'];
		$allow="1";
		$sql = $conn->query("INSERT INTO visiting_day ( `date`,`allow`)Values('{$_UpdateSname}','{$allow}')");
		phpAlert(   "You Have Successfully Add New date"   );
		

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
<link href="css/tableoutside.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
.StyleTextField{}.StyleTextField1 {}

.but{
color:gold;	
background-color:black;
width:160px;
height:40px;
margin-left:-230px;
}
</style>
<title>Prison Managment</title>
</head>

<body>
<div id="Holder">
  <div id="Navbar">
    <nav>
	  <ul>
		<li><a href="AdminLogOut.php" title="Logout">Logout</a></li>
	    <li><a href="UpdateAdminAccount.php" title="My Info">My Info</a></li>
	  <li id="Logo"><a href="AdminAccount.php" title="PRISON MANGEMENT">PRISON MANGEMENT</a>
	</ul>
  </nav>
</div>
  <div id="Content">
<div id="contentLeft">
	  <table width="100%" align="left" cellpadding="11px">
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
			        <td><a href="adminDelPrisoner.php" title="delete prisoner">⟢ Delete Prisoner</a></td>
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
      <form action="" style="StyleTextField" id="form1" name="form1" method="post" >
        <table width="54%" border="0" id="tableout">
          <tbody>
            <tr>
              <td colspan="2"><h1>Visit's date  information</h1></td>
            </tr>
            <tr>
              <td><p>
                <label for="date">Curent Date:</label>
              </p></td>
              <td><input name="date" type="text" autofocus required class="StyleTextField" id="date"value="<?php echo $_SESSION["date"]= $row["date"]; ?>" readonly></td>
            </tr>
			</p></td>
			<td><p>
                <label for="Fname">New Date:</label>
              </p></td>
              <td><input name="date" type="date" autofocus required class="StyleTextField" id="date" ></td>
            </tr> 
			
            <tr>
              <td style="text-align: center"><button class="button" style="vertical-align:middle" type="submit" name="add" id="Update" value="ADD DATE"><span>ADD  DATE </span></button></td>
            </tr>
		
          </tbody>
        </table>
      </form>
	  <form action="removevisitday.php" method="POST">
	<button class="but"  type="submit" name="remove"  value="Remove"><span>Remove visit day</span></button>
		</form>

	 </div>
  </div>
  <div id="Footer"></div>
</div>
&nbsp;
</body>
</html>
