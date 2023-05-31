
<!DOCTYPE html>
<html>
<head>
     <title>
       Nyamagabe Solidarity Fund
    </title>
    <meta name="keywords" content="">
    <link rel="shortcut icon" type="images/x-icon" href="images/logo.jpg">
    <!-- styles -->
     <link href="css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
 </head>
<body>
<div class="flex-container-background">
<div class="flex-container">
<div class="flex-item-1">
        <form action="" method="post" id="login" autocomplete="off" class="bg-light border p-3">
        <div class="form-row">
          
        <h1 class="title my-3">send message</h1>
        
        <div class="col-12">
        <div class="input-group mb-3">
        <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
        </div>
        <input name="contact" type="text" value="" class="input form-control" id="password" placeholder="Enter your Number" required="true"  />
        </div> 
        </div>
         <?php include ('sending.php')?><br><br>
        <div class="text-center">
        <button type="submit"  name="save" class="btn btn-primary"><i class="fa fa-sign-in"></i>send</button>

        </div>
         </form>
        </div>
      </div>
    </div>

</body>
</html>

