
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.css" />
  <title>Prison visit Scheduring system</title>
 <title> <img src="img/logo.PNG" alt=""><br><br>REPORT OF VISITORS</title>
 </head>
 <body>

 <style>
    .head{
      color:green;  
    }
    .print{
	background-color:blue;
	color:white;
}
</style>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5"><br><br>
            <a href="AdminAccount.php">Back</a>
             <button class="print" onClick="window.print();"><i class="fa fa-print"></i> Print</button> 
             <br><br>
             
            <center> <img src="img/logo.PNG" alt=""><h1> REPORT OF VISITORS</h1></center>
                <hr>
            </div>
        </div>
       
       
                            <form action="" method="post">
                               <h3>From date ---------To date</h3>
                            <input type="date"  name="start_date"  >
                      
                            <input type="date"  name="end_date"  >
                    
                            <td width="58%"><button class="button" style="vertical-align:middle" name="filter" type="submit"  value="filter"><span>FILTER</span></button>
                    
                      </form>
                  <div class="row mt-3">
                    <div class="col-md-12">
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless display nowrap" id="records" style="width:100%">
                                <thead>
                       <tr>
    
      <td class="head" width="15%">NAME</td>
	  <td class="head" width="11%">PRISONER ID</td>
      <td class="head" width="14%"><p>Relation</p></td>
      <td class="head" width="14%"><p>Mobile</p></td>
      <td class="head" width="14%"><p>DATE</p></td>
      </tr>
    
    <tr>
    <?php
        if(isset($_POST['filter']))
        {
        ?>
    <?php
	 require 'connection.php'; 
    $from=$_POST['start_date'];
    $to=$_POST['end_date'];
    $ac="ACCEPTED";
     $res=mysqli_query($conn,"select * from permission where  date between '$from' and '$to' and ACCESS='$ac' ");
     while($row=mysqli_fetch_array($res))
     {
	 ?>
      <td><?php echo $row["Fname"]; ?></td>
      <td><?php echo $row["PRISONER_ID"]; ?></td>
      <td><?php echo $row["Relation"]; ?></td>
      <td><?php echo $row["MOBILE"]; ?></td>
      <td><?php echo $row["date"]; ?></td>
	 
	</tr>
    <?php 
	  }
	  ?>
       <?php 
	  }
	  ?>
      </tr>
    </thead>
    </table>
</body>
</html>