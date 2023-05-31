
 <?php if(isset($_POST['remove'])){
    
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "prison";
	
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     
    $result = mysqli_query($conn, "UPDATE visiting_day SET allow = '0' where allow='1' ");
	
	      header('location:adminaddvisitday.php');
         
    }
  
    $conn->close();  
   
    }
 ?>








