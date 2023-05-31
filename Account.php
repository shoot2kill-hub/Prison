<?php
require 'connection.php';
require 'AlertMsg.php';

session_start();
	
	if(isset($_SESSION["UserID"])){
		$a=$_SESSION["UserID"];
		
		
		$NAME="SELECT Fname FROM user1 where UserID=$a";
		
		$Access="SELECT ACCESS FROM user1 where UserID=$a";
		$phone="SELECT MOBILE FROM user1 where UserID=$a";
		$date="SELECT * FROM visiting_day";

		$result = mysqli_query($conn, $NAME);
		$resultname = mysqli_query($conn,$NAME);
		if (mysqli_num_rows($resultname)>0) {
		if($row = mysqli_fetch_assoc($resultname)){	
				  	
				$fname=$row["Fname"];
		}
		}

		
		
		$resultname3 = mysqli_query($conn, $Access);
		if (mysqli_num_rows($resultname3)>0) {
		if($row = mysqli_fetch_assoc($resultname3)){	
				  	
				$access=$row["ACCESS"];
		}
		}
		

		$resultname4 = mysqli_query($conn, $date);
		if (mysqli_num_rows($resultname4)>0) {
		if($row = mysqli_fetch_assoc($resultname4)){	
				  	
				$Date=$row["date"];
		}
		}	
		$resultname5 = mysqli_query($conn, $phone);
		if (mysqli_num_rows($resultname5)>0) {
		if($row = mysqli_fetch_assoc($resultname5)){	
				  	
				$Phone=$row["MOBILE"];
		}
		}
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

<body >
<style>
  .box{
    color:black;
    padding:20px;
    display:none;
    margin-top:20px;
    text-align:center;
  }
  .dat{
	padding:5px;
	width:180px;

  }
  .time{
	width:170px;
  }
h1{
  color:orange; 
}

.f{
  float:left;
}

h2{
    color:blue;
    margin-right:100px;
}
.logout{
  float:right;
  color:red;
}
h3{
    color:grey;
}
table,td,th
{
 padding:10px;
 border-collapse:collapse;
 font-family:Georgia, "Times New Roman", Times, serif;
 border:solid #ddd 0px;
}
.tb{
	float:right;
	margin-right:300px;
}
</style>



	<div id="Holder">
<div id="Navbar">
	  <nav>
				<ul>
					<li><a href="LogOut.php" title="Logout">Logout</a></li>
	    			<li><a href="UpdateAccount.php" title="My Info">My Info</a></li>
	    			<li id="Logo"><a href="Account.php" title="PRISON MANGEMENT">PRISON VISIT MANGEMENT</a>
	    		</ul>
  </nav>
</div>
	  <div id="Content">
			<div id="PageHeading">
			  <h1>Welcome 
			  <?php
			if (mysqli_num_rows($result) > 0) {
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
				      <td><a href="AccountGrants.php" title="Check Visit Status">⟢ <strong style="font-size: 18px; text-align: left;">Check Visit Status</strong></a></td>
					  
			        </tr>
					<tr>
					<td><a href="registerview.php" title="Check Visit Status">⟢ <strong style="font-size: 18px; text-align: left;">View Prisoner ID</strong></a></td>
	                 </tr>
			         <tr>
			        <td height="600"></td>
		          </tr>
				    
			      </tbody>
			  </table>
				<h2>&nbsp;</h2>
			</div>


	<div id="contentRight">
	<form action="Account.php"  name="form1" method="post" >
			
 <h2>Request For A Visit</h2><br><br>
 <table bgcolor='sky_blue' class="tb" > 
   
   <tr>
    <td>User Id :</td>
    <td><input type="text" name="UserId" value="<?php echo $a;?>" readonly></td>
   </tr>
   <tr>
    <td>Full Name:</td>
    <td><input type="text" name="Fname" value="<?php echo $fname;?>" readonly></td>
   </tr>
   <tr>
    <td>Prisoner Id:</td>
    <td><input type="text" name="PRISONER_ID" value="" placeholder="Enter Prison ID" required></td>
   </tr>
   <tr>
    <td>Relation:</td>
    <td><input type="text" name="Relation"value="" placeholder="Enter Relationship" required></td>
   </tr>
  
   <tr>
   <td>Visit_Day:</td>
	<td>   
   <select name="date" class="dat" required> 
  
     <option selected hidden value="">Choose date</option>
     <?php
$query="SELECT * FROM visiting_day where allow='1'";
$re= mysqli_query($conn,$query);
while($f=mysqli_fetch_array($re)){
	$d=$f["date"];
?>
<option value="<?php echo $d;?>"><?php echo $d;?></option>
<?php
}
?>
</select> 
</td>

</tr>

<tr>
<td>Choose time:</td>
<td><input type="time" name="time" class="time" required></td> 
</tr> 
  
<tr> 
 <td>Contact:</td>   
<td><input type="text" name="phone"value="<?php echo $Phone;?>" readonly></td>     
   </tr>
   <tr>
   <td width="58%"><button class="button" style="vertical-align:middle" name="save" type="submit" id="Submit" value="Submit"><span>SUBMIT</span></button>
   <td><center><label  name="save"class="save"><span></span></center></td>
   </tr>
  
  </table>
 </form><br><br><br><br><br><br><br><br><br><br><br><br>
 
<?php if(isset($_POST['save'])){
    
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "prison";

	$Pid=$_POST['PRISONER_ID'];
	$rela=$_POST['Relation'];
	$time=$_POST['time'];
	$da=$_POST['date'];
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
    $INSERT ="INSERT INTO permission (UserID,Fname,PRISONER_ID,Relation,date,time,MOBILE,ACCESS) values('$a','$fname', '$Pid', '$rela','$da','$time','$Phone','$access')";
	
	//Prepare statement
      //$stmt = $conn->prepare($INSERT);
     // $stmt->execute();
      if($conn->query($INSERT)){
       // echo "<script>alert('Saved successfully')</script>";
		phpAlert(   "Your Request Has Been Sent Successfully\\n\\n You Can View Your Granted Request in Check Status"); 
		
	}else{

        echo" <script>alert('Save Failed<br>Correct your Data')</script>";
        echo "<script>window.open('Account.php.php')</script>";
    }
   // $stmt->close();
    $conn->close();  
   
    }

}


 ?>
 
</body>
</html>






