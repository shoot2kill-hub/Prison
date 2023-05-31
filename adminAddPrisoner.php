

<?php
require 'connection.php';
require 'AlertMsg.php'; 

session_start();
if(isset($_SESSION["SUPERID"])){
		$a=$_SESSION["SUPERID"];
		$sqlname = "SELECT SUPER_NAME FROM super_user where SUPERID=$a";
		$resultname = mysqli_query($conn, $sqlname);

if(isset($_POST['submit'])){
	
	$PNAME=$_POST['PNAME'];
	//$GENDER=$_POST['GENDER'];
   $DOB=$_POST['DOB'];
   $ADMISSION_DATE=$_POST['ADMISSION_DATE'];
   $RELEASE_DATE=$_POST['RELEASE_DATE'];
   $gender=$_POST['gender'];
   
   $CASETYPE=$_POST['CASETYPE'];

	$sql1 = "SELECT * FROM prison1 WHERE PNAME ='$PNAME'";


		
	$result1 = mysqli_query($conn, $sql1);	

	
		if(mysqli_num_rows($result1) > 0 ){

		phpAlert(    "Error While Registering!!\\n\\n Prisoner With Same Username Already Exist in The DATABASE" );	
	}
		else{
				
					$sql = $conn->query("INSERT INTO prison1 ( `PNAME`, `DOB`, `RELEASE_DATE`, `ADMISSION_DATE`, `gender`,`CASETYPE`)Values('{$PNAME}','{$DOB}','{$RELEASE_DATE}','{$ADMISSION_DATE}','{$gender}','{$CASETYPE}')");
				header('Location: adminViewPrisoner.php');
			
			
		}
	
}}
	
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
<title>Prison Managment</title>
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
</div>
	  <div id="Content">
	    <div id="PageHeading">
	      <h2>Hello
		<?php
			if (mysqli_num_rows($resultname) > 0) {
		//output data of each row
		if($row = mysqli_fetch_assoc($resultname)) {	
					  		
			echo $row["SUPER_NAME"];
		}}
	?>
</h2>
  </div>
	  
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
			      <td><p><a href="adminGrants.php" title="Grant permission to visitor">⟢ Grant a Permission to Visitor</a></p></td>
		        </tr>
			    
		       
				<tr>
		        	<td><a href="adminaddvisitday.php">⟢ Add Visit Day</a></td>
		        </tr>
      </table>
			  <h2>&nbsp;</h2>
	</div>
		  
		<div id="contentRight" align="center">
			  <form action="" style="StyleTextField" id="form1" name="form1" method="post" >
			    <table width="100%" id="customers" cellpadding="11px">
			      <tbody>
			        <tr>
			          <td colspan="2">plz enter the data for the prisoner</td>
		            </tr>
			        <tr>
			          <td><label for="textfield">Prisoner Name:</label></td>
			          <td><input name="PNAME" type="text" autofocus required="required" class="StyleTextField" id="PNAME"></td>
		            </tr>
			        <tr>
			          <td><label for="date">DOB:</label></td>
			          <td><input name="DOB" type="date" required="required" class="StyleTextField" id="DOB"></td>
		            </tr>
			        <tr>
			          <td><label for="date2">Admission Date:</label></td>
			          <td><label for="date2"></label>
			            <input name="ADMISSION_DATE" type="date" required="required" class="StyleTextField" id="ADMISSION_DATE"></td>
		            </tr>
			        <tr>
			          <td><label for="date3"> Release Date:</label></td>
			          <td><input name="RELEASE_DATE" type="date" required="required" class="StyleTextField" id="RELEASE_DATE"></td>
		            </tr>
			        <tr>
			          <td><label for="textfield2">GENDER:</label></td>
			          <td><input name="gender" type="text" required="required" class="StyleTextField" id="WORDID"></td>
		            </tr>
			    
		            <tr>
			          <td><label for="textfield5">Crimetype:</label></td>

			          <td>
	<select name="CASETYPE" type="text" required="required" class="StyleTextField" id="CASETYPE"> 
  <option selected hidden value="">Select Crime</option>
  <option value="Kwica">Kwica</option>
  <option value="Kwiba">Kwiba</option>
  <option value="Guhohotera">Guhohotera</option>
  <option value="Gukomeretsa">Gukomeretsa</option>
  <option value="Ruswa">Ruswa</option>
  <option value="Genocide">Genocide</option>
</select> 
						
	</td>
  </tr>
			        <tr>
			          <td><button class="button" style="vertical-align:middle" type="submit" name="submit" id="submit" value="Submit"><span>Submit </span></button></td>
			          <td>&nbsp;</td>
		            </tr>
		          </tbody>
		        </table>
			  </form>
	    </div>
</div>
		<div id="Footer"></div>
	</div>
	
</body>
</html>
