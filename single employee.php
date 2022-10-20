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
            <div class="panel-heading"> employess list </div>
            <table class="table table-bordered">

                <?php
                    $id = $_GET['e_id'] ;
                    $sql = "SELECT  * FROM employess WHERE e_id='$id' " ;
                    $result = mysqli_query($conn , $sql) ;
                
                    if (mysqli_num_rows($result) > 0) {
                
                        while($employess = mysqli_fetch_assoc($result)) { ?>
                            


                            
                            <tr>
                                    <th style="width : 130px;"> Name </th>
                                    <td>  <?php echo $employess['e_name'] ; ?>   </td>
                                    </tr>
                                    <tr>
                                    <th> email </th>
                                    <td>  <?php echo $employess['e_email'] ; ?>  </td>
                                    </tr>
                                    <tr>
                                    <th> phone number </th>
                                    <td>   <?php echo $employess['e_phone'] ; ?>  </td>
                                    </tr>
                                    <tr>
                                    <td> <a href="single employe edit.php" class="btn btn-sm btn-warning"> Edit </a>
                                    <a href="delete employee.php?e_id=<?php echo $employess['e_id'] ; ?>" class="btn btn-sm btn-danger"> Delete </a> </td>
                                    <td>   </td>


                                    
                                    </tr>
                <?php         }
                }else {
                    echo "0 results" ;
                }
                
                ?>
            </table>
            </div>
             </div>
    </div>

</div>

<script src="js/bootstrap.js" ></script>
</body>
</html>