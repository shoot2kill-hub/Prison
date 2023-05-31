

<?php
require 'connection.php';
require 'AlertMsg.php';

session_start();
	
	if(isset($_SESSION["UserID"])){
		$a=$_GET["UserID"];  
		
	$status="SELECT * FROM permission where UserID=$a";
		
		$result = mysqli_query($conn, $status);
		$resultname = mysqli_query($conn,$status);
		if (mysqli_num_rows($resultname)>0) {
		if($row = mysqli_fetch_assoc($resultname)){	
				  	
				$useid=$row["UserID"];
		}
		}

		
		
        $result = mysqli_query($conn, $status);
		$resultname = mysqli_query($conn,$status);
		if (mysqli_num_rows($resultname)>0) {
		if($row = mysqli_fetch_assoc($resultname)){	
				  	
				$Fname=$row["Fname"];
		}
		}
		
	
        $result = mysqli_query($conn, $status);
		$resultname = mysqli_query($conn,$status);
		if (mysqli_num_rows($resultname)>0) {
		if($row = mysqli_fetch_assoc($resultname)){	
				  		
				  	
				$Phone=$row["MOBILE"];
		}
		}
        $result = mysqli_query($conn, $status);
		$resultname = mysqli_query($conn,$status);
		if (mysqli_num_rows($resultname)>0) {
		if($row = mysqli_fetch_assoc($resultname)){	
				  		
				  	
				$date=$row["date"];
		}
		}
    $result = mysqli_query($conn, $status);
		$resultname = mysqli_query($conn,$status);
		if (mysqli_num_rows($resultname)>0) {
		if($row = mysqli_fetch_assoc($resultname)){	
				  		
			$time=$row["time"];
		}
		}

    $result = mysqli_query($conn, $status);
    $resultname = mysqli_query($conn,$status);
    if (mysqli_num_rows($resultname)>0) {
    if($row = mysqli_fetch_assoc($resultname)){	
              
      $PRISONER_ID=$row["PRISONER_ID"];
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
					
		<li id="Logo"><a href="AdminGrants.php" title="PRISON MANGEMENT">Back</a>
	    		</ul>
  </nav>
</div>
	  

<div id="contentRight"> 
<form action="" style="StyleTextField" id="form1" name="form1" method="get" >
<table width="95%" cellpadding="0" id="customers"> 
  <tbody>  
    <tr>
      <td align="center" height="30" colspan="9"><strong><em>
        <h3>ACCEPTED VISITORS FOR  PRISONER</h3></em></strong></td>        
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
	
 </tr>

 
 <?php
 $a=$_GET["UserID"];  
		
    $status="SELECT * FROM permission where UserID=$a";
      
      $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
              
          $useid=$row["UserID"];
      }
      }
  
      
      
          $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
              
          $Fname=$row["Fname"];
      }
      }
      
    
          $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
                
              
          $Phone=$row["MOBILE"];
      }
      }
          $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
                
              
          $date=$row["date"];
      }
      }
      $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
                
        $time=$row["time"];
      }
      }

      $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
                
        $PRISONER_ID=$row["PRISONER_ID"];
      }
      }
    ?>
    <?php
   
	 //$a=$_POST['prisoner_id'];  
   $res=mysqli_query($conn,"select * from permission WHERE ACCESS='ACCEPTED' AND PRISONER_ID='$PRISONER_ID'");
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
      
                  
       <?php } ?>      
	</tr>
      <tr class="StyleTextField">
     
      
  	</tbody>
	</table>
</form>
	   

	<div>
	<form name="form1" method="post" >
			
 <center><h2>ACCEPTING REQUEST TO VISIT INMATE</h2><br>
 <table bgcolor='white' class="tb" > 
   
 <?php
 $a=$_GET["UserID"];  
		
    $status="SELECT * FROM permission where UserID=$a";
      
      $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
              
          $useid=$row["UserID"];
      }
      }
  
      
      
          $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
              
          $Fname=$row["Fname"];
      }
      }
      
    
          $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
                
              
          $Phone=$row["MOBILE"];
      }
      }
          $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
                
              
          $date=$row["date"];
      }
      }
      $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
                
        $time=$row["time"];
      }
      }

      $result = mysqli_query($conn, $status);
      $resultname = mysqli_query($conn,$status);
      if (mysqli_num_rows($resultname)>0) {
      if($row = mysqli_fetch_assoc($resultname)){	
                
        $PRISONER_ID=$row["PRISONER_ID"];
      }
      }
    ?>


   <tr>
    
    <td><input type="text" name="UserId" value="<?php echo $a;?>" readonly></td>
   </tr>
   <tr>
    
    <td><input type="text" name="Fname" value="<?php echo $Fname;?>" readonly></td>
   </tr>
   <tr>
    
    <td><h6>Prisoner ID</h6><br>
    <input type="text" name="prisoner_id" value="<?php echo $PRISONER_ID;?>" readonly></td>
   </tr>
   <tr> 
 <td><input type="text" name="date"value="<?php echo $date;?>" readonly></td>     
   </tr>
   <tr> 
 <td><input type="text" name="time"value="<?php echo $time;?>" readonly></td>     
   </tr>
   <tr> 

<td><input type="text" name="phone"value="<?php echo $Phone;?>" readonly></td>     
</tr>
   <tr>
   <td width="58%"><button class="button" style="vertical-align:middle" name="save1" type="submit" id="Submit" value="save1"><span>CONFIRM</span></button>
  
   </tr>
  
  </table>
 </form><br><br><br><br><br><br><br><br><br><br><br><br>
 </center>
 </div>
 </div>
</div>
 
 <?php if(isset($_POST['save1'])){
    
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "prison";
	
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     
    $result = mysqli_query($conn, "UPDATE permission SET ACCESS = 'ACCEPTED' where UserID= '$useid' ");
	
	      header('location:adminViewVisitor.php');
         
    }
  
    $conn->close();  
   
    }
 ?>


<?php
include("connection.php");
if(isset($_POST['save1']))
{
  
 
 $phone=$_POST["phone"];
 $fname=$_POST["Fname"];
 $Date=$_POST["date"];
 $time=$_POST["time"];
$msg2 = " Dear ".$fname.":".$phone.", Ubusabe bwanyu bwo gusura Umugororwa Bwakiriwe. Umunsi wo gusura ni:".$Date." : ".$time.", Gusura birangira: 18:00 PM Kubindi bisobanuro Sura urubuga Rwacu. ";
 $data=array(
 "sender"=>'250786329768',   
"recipients"=>$phone,
"message"=>$msg2,
 );
 $url="https://www.intouchsms.co.rw/api/sendsms/.json";
 $data=http_build_query($data);
 $username="Mihigo01";
 $password="Ganza@2014";
 $ch=curl_init();
 curl_setopt($ch,CURLOPT_URL,$url);
 curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
 curl_setopt($ch,CURLOPT_POST,true);
 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
 curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
 curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
 $result=curl_exec($ch);
 $httpcode=curl_getinfo($ch,CURLINFO_HTTP_CODE);
 curl_close($ch);
}
?>

</body>
</html>





