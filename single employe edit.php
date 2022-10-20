<?php
session_start() ;
require 'conn.php' ;
if (!$_SESSION['u_name']) {
    header('location:index.php') ;
}
?>
<html lang="en">
<head>
    <style>
        * {
            direction: ltr;
        }
    </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> welcome </title>
    <link  rel="stylesheet" href="css/bootstrap.css">
    
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" 
integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
</head>
<body>


<!-- nav -->
<?php require 'nav.php' ; ?>
<!-- nav -->

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3" >
            <div class="panel panel-default">
                <div class="panel panel-heading">  employess </div>
                <ul class="list-group">

                    <li class="list-group-item"> <a href="add new employe.php"> add new employer </a>
                    <li class="list-group-item"> <a href="dash.php"> view all employees </a>
                    </li>
                </ul>
                </div>
            </div>
        <div class="col-lg-9 col-md-9" > 
            <div class="panel panel-default">
            <div class="panel-heading"> add employess  </div>
            <div class="panel-body">
                <form action="" method="POST">
                <?php
                    $id = $_GET['e_id'] ;
                    $sql = "SELECT  * FROM employess WHERE e_id='$id' " ;
                    $result = mysqli_query($conn , $sql) ;
                
                    if (mysqli_num_rows($result) > 0) {
                
                        while($employess = mysqli_fetch_assoc($result)) { ?>
                    <div class="form-group">
                        <input type="text" class="form-control input-sm" name="e_name"   placeholder="employee name" value="<?php echo $employess['e_name'] ; ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control input-sm" name="e_email" placeholder="employee email" value="<?php echo $employess['e_email'] ; ?>"  required>
                    </div>
                    <div class="form-group">
                        <input type="tel" class="form-control input-sm"  name="e_phone"  placeholder="employee phone number" value="<?php echo $employess['e_phone'] ; ?>"  required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" value="update employee" name="e_update" >
                    </div>
                    <?php         }
                }else {
                    echo "0 results" ;
                }
                
                ?>
                </form>
            </div>
            </div>
             </div>
    </div>

</div>
<!-- main content -->
<?php

if (isset($_POST['e_update']) )  {
    $e_name = $_POST['e_name'] ;
    $e_email = $_POST['e_email'] ;
    $e_phone = $_POST['e_phone'] ;

    $sql = "UPDATE employess SET e_name = '$e_name' , e_email='$e_email' , e_phone='$e_phone' WHERE e_id= '$id' " ;

    if (mysqli_query($conn , $sql)) {
        header('location: dash.php') ;
    } else {
        echo "error updating data" . mysqli_error($conn) ;
    }


}

?>


<script src="js/bootstrap.js" ></script>
</body>
</html>