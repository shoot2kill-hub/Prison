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
.cm{
    width:200px;
    height:40px;
}
.cmm{
    width:200px;
    height:25px;
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
	<form  name="form1" method="post" >
			
 <center><h2>REJECTING REQUEST TO VISIT INMATE</h2><br>
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
    ?>
   <tr>
    
    <td><input type="text" name="UserId" class="cmm"  value="<?php echo $a;?>" readonly></td>
   </tr>
   <tr>
    
    <td><input type="text" name="Fname" class="cmm" value="<?php echo $Fname;?>" readonly></td>
   </tr>
  
   <tr> 
 <td><input type="text" name="date" class="cmm"  value="<?php echo $date;?>" readonly></td>     
   </tr>

   <tr> 
<td><input type="text" name="phone" class="cmm" value="<?php echo $Phone;?>" readonly></td>     
</tr>

<tr> 
<td><input type="text" name="comment" class="cm" placeholder="Enter comment" required></td>     
</tr>

   <tr>
   <td width="58%"><button class="button" style="vertical-align:middle" name="save2" type="submit" id="Submit" value="save2"><span>REJECT</span></button>
 
   </tr>
  
  </table>
 </form><br><br><br><br><br><br><br><br><br><br><br><br>
 
 <?php if(isset($_POST['save2'])){
    
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "prison";
	$comment=$_POST['comment'];
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     
        $result = mysqli_query($conn, "UPDATE permission SET ACCESS = 'REJECTED', comment='$comment' where UserID= '$useid' ");
		
        header('location:adminViewVisitor.php');
       
    }
   // $stmt->close();
    $conn->close();  
   
    }
 ?>


<?php
include("connection.php");
if(isset($_POST['save2'])){

 $phone=$_POST["phone"];
 $fname=$_POST["Fname"];
 $comment=$_POST["comment"];
 $msg2 = " Dear ".$fname.":".$phone.", Ubusabe bwanyu bwo gusura Umugororwa Ntibubashije kwemerwa;IMPAMVU:".$comment." Kubindi bisobanuro hamagara Tel:0784880470 . Murakoze";
 $data=array(
 "sender"=>'250786329768', 
"recipients"=>$phone,
"message"=>$msg2,
 );
 $url="https://www.intouchsms.co.rw/api/sendsms/.json";
 $data=http_build_query($data);
// $username="solangee1";
 //$password="solange@123";
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






